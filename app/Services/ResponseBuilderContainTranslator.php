<?php

namespace App\Services;
use App\Traits\TranslatorGetterable;
use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Contracts\Translation\Translator;
use App\Contracts\Services\ResponseBuilderContainTranslator as Contract;

abstract class ResponseBuilderContainTranslator extends ResponseBuilder implements Contract
{
    use TranslatorGetterable;
    protected Translator $translator;
    public function __construct(Response $response , Translator $translator)
    {
        parent::__construct($response);
        $this->translator = $translator;
    }
}
