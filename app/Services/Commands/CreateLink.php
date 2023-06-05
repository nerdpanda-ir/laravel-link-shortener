<?php

namespace App\Services\Commands;
use App\Contracts\Exceptions\FailCrud;
use App\Contracts\Model\Link;
use App\Contracts\Services\Commands\CreateLink as Contract;
use App\Contracts\Redirectors\Createable as Redirector;
use App\Contracts\Services\ResponseVisitors\SaveAction;
use App\Exceptions\FailCrud as FailCrudException;
use App\Traits\LoggerGetterable;
use App\Traits\TranslatorGetterable;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Translation\Translator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Psr\Log\LoggerInterface as Logger;

class CreateLink implements Contract
{
    use TranslatorGetterable , LoggerGetterable;

    protected SaveAction $responseVisitor;
    protected Redirector $redirector;
    /**
     * @var callable $createdResponse
     */
    protected $createdResponse;
    protected Application $container;
    protected string $linkModel = Link::class ;
    protected Translator $translator;
    protected Logger $logger ;
    protected ExceptionHandler $exceptionHandler;

    /**
     * @var callable $failResponse
     */
    protected $failResponse;

    /**
     * @var callable $throwExceptionResponse
     */
    protected $throwExceptionResponse;
    public function __construct(
        SaveAction $responseVisitor , Application $container , ExceptionHandler $exceptionHandler ,
        Logger $logger , Translator $translator ,
    ){
        $this->responseVisitor = $responseVisitor;
        $this->container = $container ;
        $this->exceptionHandler = $exceptionHandler;
        $this->logger = $logger ;
        $this->translator = $translator ;
    }

    public function execute(string $original, string $createdAt ,?string $creator = null): RedirectResponse
    {
        try {
            /** @var \App\Models\Link $linkModel*/
            $linkModel = $this->getContainer()->make($this->getLinkModel());
            $linkModel->setRawAttributes([
                'original'=> $original , 'created_at' => $createdAt ,
                'creator' => $creator , 'summary' => $linkModel->generateUniqueSummary() ,
            ]);
            $saved = $linkModel->save();
            if (!$saved)
                throw new FailCrudException();
            return call_user_func_array($this->getCreatedResponse(),[$linkModel]);
        }catch (FailCrud $exception){
            $exception->setMessage($this->getTranslator()->get('log.crud.save.fail', ['item' => 'link']));
            $exception->setContext(['link' => $linkModel]);
            $this->getExceptionHandler()->report($exception);
            $response = $this->getRedirector()->create(['url'=>$original]) ;
            return $this->getResponseVisitor()->fail($response,'link');
        }catch (\Throwable $exception){
            $context = [];
            if (isset($linkModel) && empty($linkModel->getAttributes()))
                $context['link']  = $linkModel ;
            else
                $context['link'] = ['original'=>$original,'createdAt' => $createdAt , 'creator'=>$creator];
            $this->getLogger()->emergency(
                $this->getTranslator()->get('log.crud.save.throw_exception', ['item' => 'link']) , $context
            );
            $this->getExceptionHandler()->report($exception);
            $response = $this->getRedirector()->create(['url'=>$original]);
            return $this->getResponseVisitor()->throwException( $response , 'link '.$original );
        }
    }

    public function getResponseVisitor(): SaveAction
    {
        return $this->responseVisitor;
    }

    public function setResponseVisitor(SaveAction $responseVisitor): self
    {
        $this->responseVisitor = $responseVisitor ;
        return $this;
    }

    public function getCreatedResponse(): callable
    {
        return $this->createdResponse;
    }

    public function setCreatedResponse(callable $response):self
    {
        $this->createdResponse = $response;
        return $this;
    }

    public function getContainer(): Application
    {
        return $this->container;
    }
    public function getLinkModel(): string
    {
        return $this->linkModel;
    }

    public function getExceptionHandler(): ExceptionHandler
    {
        return $this->exceptionHandler;
    }

    public function getRedirector(): Redirector
    {
        return $this->redirector;
    }

    public function setRedirector(Redirector $redirector): Contract
    {
        $this->redirector = $redirector ;
        return $this;
    }

}
