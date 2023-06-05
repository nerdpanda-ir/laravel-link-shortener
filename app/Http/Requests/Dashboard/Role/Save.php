<?php

namespace App\Http\Requests\Dashboard\Role;

use App\Contracts\Requests\Dashboard\Role\Save as Contract;
use App\Contracts\Rule\ArrayIsExistsInTable;
use App\Contracts\Services\MessageBuilders\Rule\Dashboard\Role\ArrayIsExistsInTable as MessageBuilder;
use App\Contracts\Services\ResponseVisitors\Rule\ExplodeArrayExistsInTable as ResponseVisitor;
use App\Http\Redirector\Dashboard\Role as Redirector;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Foundation\Http\FormRequest;

class Save extends FormRequest implements Contract
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Factory $auth): bool
    {
        return $auth->guard('web')
                    ->user()
                    ->can('create-role');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(
        ArrayIsExistsInTable $arrayIsExistsInTableRule , MessageBuilder $messageBuilder ,
        Redirector $redirector , ResponseVisitor $responseVisitor ,
    ): array
    {
        $arrayIsExistsInTableRule->setTable('permissions');
        $arrayIsExistsInTableRule->setColumn('name');
        $arrayIsExistsInTableRule->setFailMessage($messageBuilder);
        $arrayIsExistsInTableRule->setExplodeResponse(
            fn()=> $redirector->create($this->only(['name','permissions']))
        );
        $arrayIsExistsInTableRule->setExplodeResponseVisitor($responseVisitor);
        return [
            'name'=> 'required|max:64|unique:roles' ,
            'permissions' => ['array',$arrayIsExistsInTableRule] ,
        ];
    }
}
