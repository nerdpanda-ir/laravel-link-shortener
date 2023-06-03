<?php

namespace App\Http\Requests\Link;

use Illuminate\Foundation\Http\FormRequest;
use App\Contracts\Requests\Link\Save as Contract;
class Save extends FormRequest implements Contract
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'url'=>'required|max:2000|url'
        ];
    }
}
