<?php

namespace App\Http\Requests\Dashboard\Role;

use App\Contracts\Rule\ArrayIsExistsInTable;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Foundation\Http\FormRequest;
use App\Contracts\Requests\Dashboard\Role\Save as Contract;
use App\Contracts\Responses\Rules\Dashboard\role\save\ExplodeArrayExistsInTableBridge;
use App\Contracts\Services\MessageBuilders\Rule\Dashboard\Role\Save\ArrayIsExistsInTable  as MessageBuilder;
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
        ArrayIsExistsInTable $arrayIsExistsInTableRule , ExplodeArrayExistsInTableBridge $explodeRuleResponseBuilder ,
        MessageBuilder $messageBuilder ,
    ): array
    {
        $arrayIsExistsInTableRule->setTable('permissions');
        $arrayIsExistsInTableRule->setColumn('name');
        $arrayIsExistsInTableRule->setExplodeResponseBuilder($explodeRuleResponseBuilder);
        $arrayIsExistsInTableRule->setFailMessage($messageBuilder);
        return [
            'name'=> 'required|max:64|unique:roles' ,
            'permissions' => ['array',$arrayIsExistsInTableRule] ,
        ];
    }
}
