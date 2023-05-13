<?php

namespace App\Services\ResponseVisitors;
use App\Contracts\Services\ResponseVisitors\CrudActionResponseVisitor as Contract;
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
