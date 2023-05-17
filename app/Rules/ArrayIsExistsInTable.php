<?php

namespace App\Rules;

use App\Contracts\DatabaseManagerGetterable;
use App\Contracts\RuleExplodeResponseBuilder;
use App\Contracts\Services\DateService;
use App\Services\FailRuleMessageBuilder;
use App\Traits\DateServiceGetterable;
use App\Traits\ExceptionHandlerGetterable;
use App\Traits\FailRuleMessageBuilderable;
use App\Traits\LoggerGetterable;
use App\Traits\RuleExplodeResponseBuilderable;
use App\Traits\RuleExplodeResponseBuilderGetterable;
use App\Traits\TranslatorGetterable;
use Closure;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Traits\DatabaseManagerGetterable as DatabaseManagerGetterableTrait;
use Illuminate\Database\ConnectionResolverInterface as DatabaseManager;
use App\Contracts\Rule\ArrayIsExistsInTable as Contract;
use Illuminate\Support\Collection;
use Psr\Log\LoggerInterface as Logger;

class ArrayIsExistsInTable implements ValidationRule , Contract
{
    use TranslatorGetterable ,  LoggerGetterable  , DateServiceGetterable ;
    use DatabaseManagerGetterableTrait ,ExceptionHandlerGetterable , FailRuleMessageBuilderable ;
    use RuleExplodeResponseBuilderable ;
    protected string $table;
    protected string $column;
    protected DatabaseManager $databaseManager;
    protected Translator $translator;
    protected Logger $logger;
    protected DateService $dateService ;
    protected ExceptionHandler $exceptionHandler;
    /**
     * @var RuleExplodeResponseBuilder
     * when this rule throw exception we use response bridge for back use to page !!!
     */
    protected RuleExplodeResponseBuilder $explodeResponseBuilder;
    protected FailRuleMessageBuilder $failMessageBuilder;
    public function __construct(
        DatabaseManager $databaseManager , Translator $translator , Logger $logger ,
        ExceptionHandler $exceptionHandler , DateService $dateService ,

    )
    {
        $this->databaseManager = $databaseManager;
        $this->translator = $translator;
        $this->logger = $logger;
        $this->exceptionHandler = $exceptionHandler ;
        $this->dateService = $dateService ;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try {
            /** @var Collection $rows */
            $rows = $this->databaseManager
                ->table($this->getTable())->whereIn($this->getColumn(),$value)
                ->get([$this->getColumn()]);
            $names = $rows->pluck('name')->toArray();
            foreach ($value as $item)
                if (!in_array($item,$names))
                    $fail(
                        $this->getFailMessage()->build(
                            collect(['value'=> $item])
                        )
                    );
        }catch (\Throwable $exception){
            $this->logger->emergency(
                $this->getTranslator()->get('log.validations', ['rule' => self::class])
            );
            $this->getExceptionHandler()->report($exception);
            $responsePayload = collect([
                'date'=> $this->getDateService()->date() , 'attribute'=> $attribute ,
                'inputs' => request()->except(['__token'])
            ]);
            $this->explodeResponseBuilder->Build($responsePayload)->send();
        }
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable(string $table): void
    {
        $this->table = $table;
    }

    /**
     * @return string
     */
    public function getColumn(): string
    {
        return $this->column;
    }

    /**
     * @param string $column
     */
    public function setColumn(string $column): void
    {
        $this->column = $column;
    }

}
