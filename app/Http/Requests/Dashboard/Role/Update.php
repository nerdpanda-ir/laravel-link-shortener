<?php

namespace App\Http\Requests\Dashboard\Role;

use App\Contracts\Requests\Dashboard\Role\Update as Contract;
use App\Contracts\Rule\ArrayIsExistsInTable;
use App\Contracts\Rule\UniqueExcept;
use App\Contracts\Services\ResponseVisitors\Rule\ExplodeArrayExistsInTable;
use App\Contracts\Services\UniqueExceptImplBridge;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\Contracts\Services\MessageBuilders\Rule\Dashboard\Role\ArrayIsExistsInTable as MessageBuilder;
use App\Contracts\Redirectors\Role as Redirector;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Update extends FormRequest implements Contract
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Auth $auth): bool
    {
        return $auth->guard('web')->user()->can('edit-role');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(
        UniqueExcept $uniqueExceptRule , ArrayIsExistsInTable $arrayIsExistsInTableRule ,
        UniqueExceptImplBridge $bridge , MessageBuilder $failMessageBuilder , Redirector $redirector ,
        ExplodeArrayExistsInTable $responseVisitor ,
    ): array
    {

        $bridge->setTableName('roles')->setExceptColumn('id')
            ->setExcepts([$this->route()->parameter('id')])
            ->setOnlyColumn('name')->setOnly($this->get('name'));
        $uniqueExceptRule->setExistableBridge($bridge);

        $arrayIsExistsInTableRule->setTable('permissions');
        $arrayIsExistsInTableRule->setColumn('name');
        $arrayIsExistsInTableRule->setFailMessage($failMessageBuilder);
        $responsePayload = [
            $this->id , $this->route()->parameter('name'),$this->only(['name','permissions'])
        ];
        $arrayIsExistsInTableRule->setExplodeResponse(
            fn() => $redirector->edit(...$responsePayload)
        );
        $arrayIsExistsInTableRule->setExplodeResponseVisitor($responseVisitor);
        return [
            'name'=> ['required','max:64',$uniqueExceptRule] ,
            'permissions' => ['array' , $arrayIsExistsInTableRule]
        ];
    }
}
?>
