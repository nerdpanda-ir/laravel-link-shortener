<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoLoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|min:5|max:42' ,
            'password' => 'required|min:8'
        ];
    }
}
