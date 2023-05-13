<?php

namespace App\Services;
use App\Contracts\Services\CrudActionResponseVisitor as Contract;
use App\Traits\TranslatorGetterable;
use Illuminate\Contracts\Translation\Translator;

abstract class CrudActionResponseVisitor implements Contract
{
    use TranslatorGetterable;
    protected Translator $translator;
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }
}
