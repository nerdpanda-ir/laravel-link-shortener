<?php

namespace App\Http\Responses\Rule\Dashboard\Role;
use App\Contracts\Responses\Rules\Dashboard\role\save\ExplodeArrayExistsInTableBridge as Contract;
use App\Services\ResponseBuilderContainTranslator;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

class ExplodeArrayExistsInTableBridge extends ResponseBuilderContainTranslator implements Contract
{
    public function Build(?Collection $arguments = null): Response
    {
        return $this->getResponse()->redirectToRoute('dashboard.role.create')
                    ->withInput($arguments->get('inputs'))
                    ->with(
                        'system.messages.error' , [
                            $this->getTranslator()->get(
                                'validation.custom.attribute-name.array_is_exists_in_table.throw_exception', [
                                    'date' =>  $arguments->get('date') ,
                                    'attribute' => $arguments->get('attribute')
                                ]
                            )
                        ]
                    );
    }
}
