<?php

namespace App\Traits;

use Illuminate\Contracts\Translation\Translator;

trait TranslatorGetterable
{
    public function getTranslator():Translator {
        return $this->translator;
    }
}
