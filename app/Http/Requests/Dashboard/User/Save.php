<?php

namespace App\Http\Requests\Dashboard\User;

use App\Contracts\Redirectors\User;
use App\Contracts\Rule\ArrayIsExistsInTable;
use App\Contracts\Services\ResponseVisitors\Rule\ExplodeArrayExistsInTable;
use Illuminate\Foundation\Http\FormRequest;
use App\Contracts\Requests\Dashboard\User\Save as Contract;
use App\Contracts\Services\MessageBuilders\Rule\Dashboard\User\ArrayIsExistsInTable as FailRuleMessageBuilder;
use Illuminate\Contracts\Auth\Factory as Auth;
class Save extends FormRequest implements Contract
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Auth $auth): bool
    {
        $user = $auth->guard('web')->user();
        return $user->can('create-user');
    }

    /**
     * Get the validation rules that apply to the request.
     * @param \App\Http\Redirector\User $userRedirector
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     *
     */
    public function rules(
        User $userRedirector , ExplodeArrayExistsInTable $visitor , ArrayIsExistsInTable $arrayIsExistsInTableRule ,
        FailRuleMessageBuilder $failRuleMessageBuilder ,
    ): array
    {
        /** @var \App\Models\User $user */
        $user = \AuthenticatedUser::getUser();
        $canSetPasswordForUser = $user->can('set-password-for-user');
        $arrayIsExistsInTableRule->setExplodeResponse($userRedirector->viewAll());
        $arrayIsExistsInTableRule->setExplodeResponseVisitor($visitor);
        $arrayIsExistsInTableRule->setTable('roles');
        $arrayIsExistsInTableRule->setColumn('name');
        $arrayIsExistsInTableRule->setFailMessage($failRuleMessageBuilder);

        return [
            'full_name'=> 'required|max:255' ,
            'username' => 'required|max:42|unique:users,user_id' ,
            'email' => 'required|max:42|email|unique:users,email|' ,
            'password' => (($canSetPasswordForUser) ? 'required|' : '').'min:8|confirmed' ,
            'password_confirmation' =>  (($canSetPasswordForUser) ? 'required|' : '').'min:8' ,
            'roles'=> ['array',$arrayIsExistsInTableRule] ,

        ];
    }
}
