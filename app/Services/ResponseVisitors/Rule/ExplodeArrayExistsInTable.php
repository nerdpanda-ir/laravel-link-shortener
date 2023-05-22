<?php

namespace App\Services\ResponseVisitors\Rule;
use App\Contracts\Services\ResponseVisitors\Rule\ExplodeArrayExistsInTable as Contract;
use App\Traits\TranslatorGetterable;
use Illuminate\Contracts\Translation\Translator;
use Symfony\Component\HttpFoundation\Response;

class ExplodeArrayExistsInTable implements Contract
{
    use TranslatorGetterable;
    protected Translator $translator;
    public function __construct(Translator $translator)
    {
        $this->translator = $translator ;
    }

    public function visit(Response $response , string $date , string $attribute): Response
    {
        return $response->with(
            'system.messages.error', [
                $this->getTranslator()->get(
                    'validation.custom.attribute-name.array_is_exists_in_table.throw_exception',
                    ['date' => $date, 'attribute' => $attribute]
                )
            ]);
    }
}
