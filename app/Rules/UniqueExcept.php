<?php

namespace App\Rules;

use App\Traits\DatabaseManagerGetterable;
use App\Traits\TranslatorGetterable;
use Closure;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Contracts\Rule\UniqueExcept as Contract;
use Illuminate\Database\ConnectionResolverInterface;
use Illuminate\Database\ConnectionResolverInterface as DatabaseManager;
use App\Contracts\Services\UniqueExceptExistableBridge as ExistableBridge;
class UniqueExcept implements ValidationRule , Contract
{
    use TranslatorGetterable;
    protected Translator $translator;
    protected ExistableBridge $existableBridge;
    public function __construct(Translator $translator)
    {
        $this->translator = $translator ;
    }

    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     * @throws \Exception
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $isExists  = $this->getExistableBridge()->build();
        if ($isExists)
            $fail(
                $this->getTranslator()->get('validation.unique', ['attribute' => $attribute])
            );
    }

    /**
     * @return ExistableBridge
     */
    public function getExistableBridge(): ExistableBridge
    {
        return $this->existableBridge;
    }

    /**
     * @param ExistableBridge $existableBridge
     */
    public function setExistableBridge(ExistableBridge $existableBridge): void
    {
        $this->existableBridge = $existableBridge;
    }



}
