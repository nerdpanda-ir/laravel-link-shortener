<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Auth\Factory as Auth;
use App\Contracts\Requests\DoRegister as Contract;
class DoRegister extends FormRequest implements Contract
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Auth $auth): bool
    {
        $authenticated = $auth->guard('web')->check();
        return !$authenticated;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|max:255' ,
            'username' => 'required|max:42|unique:users,user_id' ,
            'email' => 'required|email|max:42|unique:users' ,
            'password' => 'required|confirmed|min:8' ,
            'accept_rules' => 'required'
        ];
    }
}
