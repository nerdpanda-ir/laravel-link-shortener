<?php

namespace App\Http\Requests\Dashboard\Permission;

use Illuminate\Foundation\Http\FormRequest;
use App\Contracts\Requests\Dashboard\Permission\StoreRequest as Contract;
use Illuminate\Contracts\Auth\Factory as Auth;

class StoreRequest extends FormRequest implements Contract
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Auth $auth): bool
    {
        return $auth->guard('web')
                ->user()
                ->can('create-permission');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','max:64',"unique:permissions" ],
        ];
    }
}
