<?php

namespace App\Http\Responses\Dashboard\Permission\Update;
use App\Contracts\Responses\Dashboard\Permission\Update\ExceptionThrow as Contract;
use App\Services\ResponseBuilder;
use App\Traits\TranslatorGetterable;
use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Contracts\Translation\Translator;
use Symfony\Component\HttpFoundation\RedirectResponse;

//@todo same translator in many res builder !!!
class ExceptionThrow extends ResponseBuilder implements Contract
{
    use TranslatorGetterable;

    protected Translator $translator;

    public function __construct(Response $response, Translator $translator)
    {
        parent::__construct($response);
        $this->translator = $translator;
    }
    public function build(string $permission , array $inputs): RedirectResponse
    {
        return $this->getResponse()
                ->redirectToRoute('dashboard.permission.edit',$permission)
                ->withInput($inputs)
                ->with('system.messages.error',[
                    $this->translator->get(
                        'messages.update.permission.exceptionThrow', ['permission' => $permission]
                    )
                ]);
    }

}
