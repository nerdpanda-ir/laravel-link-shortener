<?php

namespace App\Http\Requests\Dashboard\User;

use App\Contracts\Rule\ArrayIsExistsInTable;
use App\Contracts\Rule\UniqueExcept;
use App\Contracts\Services\ResponseVisitors\Rule\ExplodeArrayExistsInTable as ResponseVisitor;
use App\Contracts\Services\UniqueExceptImplBridge;
use Illuminate\Foundation\Http\FormRequest;
use App\Contracts\Requests\Dashboard\User\Update as Contract;
use App\Contracts\Services\MessageBuilders\Rule\Dashboard\User\ArrayIsExistsInTable as MessageBuilder;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Update extends FormRequest implements Contract
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return \AuthenticatedUser::getUser()->can('edit-user');
    }

    /**
     * Get the validation rules that apply to the request.
     * @param \App\Rules\UniqueExcept $uniqueExceptRule
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     *
     */
    public function rules(
        UniqueExcept $uniqueExceptRule ,UniqueExceptImplBridge $uniqueExceptBridge ,
        ArrayIsExistsInTable $arrayIsExistsInTable , MessageBuilder $messageBuilder ,
        ResponseVisitor $responseVisitor ,
    ): array
    {
        $oldUsername = \session()->get('old_data_for_edit.username');
        $oldEmail = \session()->get('old_data_for_edit.email');
        $usernameColumn = 'user_id';
        $emailColumn = 'email';

        $uniqueExceptBridge->setTableName('users')->setExceptColumn($usernameColumn)
                           ->setExcepts([$oldUsername])->setOnlyColumn($usernameColumn)
                           ->setOnly($this->get('username'));


        $uniqueExceptRule->setExistableBridge($uniqueExceptBridge);

        $emailUniqueExceptRule = clone $uniqueExceptRule;
        $emailUniqueExceptBridge = clone $uniqueExceptBridge;

        $emailUniqueExceptBridge->setExceptColumn($emailColumn)->setExcepts([$oldEmail])
                                ->setOnlyColumn($emailColumn)->setOnly($this->get('email'));

        $emailUniqueExceptRule->setExistableBridge($emailUniqueExceptBridge);


        $arrayIsExistsInTable->setTable('roles');
        $arrayIsExistsInTable->setColumn('name');
        $arrayIsExistsInTable->setFailMessage($messageBuilder);
        $arrayIsExistsInTable->setExplodeResponse(
            function ():RedirectResponse {
                return \UserRedirector::edit(
                    id: $this->route()->parameter('id') ,
                    name: $this->route()->parameter('name'),
                    inputs: $this->except('_token'));
            }
        );

        $arrayIsExistsInTable->setExplodeResponseVisitor($responseVisitor);

        return [
            'full_name' => 'required|max:255',
            'username' => ['required','max:42',$uniqueExceptRule] ,
            'email'=> ['required','email','max:42',$emailUniqueExceptRule] ,
            'password' => 'nullable|min:8|confirmed' ,
            'roles'=> ['array',$arrayIsExistsInTable]
        ];
    }
}
