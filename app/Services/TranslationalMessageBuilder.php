<?php

namespace App\Services;
use App\Contracts\Services\TranslationalMessageBuilder as Contract;
use App\Traits\TranslatorGetterable;
use Illuminate\Contracts\Translation\Translator ;
abstract class TranslationalMessageBuilder extends MessageBuilder implements Contract
{
    use TranslatorGetterable;
    protected Translator $translator;
    public function __construct(Translator $translator)
    {
        $this->translator = $translator ;
    }
}
