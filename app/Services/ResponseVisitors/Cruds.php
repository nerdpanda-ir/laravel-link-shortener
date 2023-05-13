<?php

namespace App\Services\ResponseVisitors;
use App\Contracts\Services\ResponseVisitors\Cruds as Contract;
use App\Traits\TranslatorGetterable;
use Illuminate\Contracts\Translation\Translator;

abstract class Cruds implements Contract
{
    use TranslatorGetterable;
    protected Translator $translator;
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }
}
