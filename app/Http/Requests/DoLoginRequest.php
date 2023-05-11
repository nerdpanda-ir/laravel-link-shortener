<?php

namespace App\Http\Requests;

use App\Contracts\Requests\DoLogin as Contract;
use Illuminate\Foundation\Http\FormRequest;

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
