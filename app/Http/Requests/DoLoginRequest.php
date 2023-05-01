<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Contracts\DoLoginRequestContract as Contract;
class DoLoginRequest extends FormRequest implements Contract
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|min:5|max:42' ,
            'password' => 'required|min:8'
        ];
    }
}
