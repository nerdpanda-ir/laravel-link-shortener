<?php

namespace App\Contracts;

use Illuminate\Contracts\Translation\Translator;

interface TranslatorGetterable
{
    public function getTranslator():Translator;
}
