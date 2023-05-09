<?php

namespace App\Http\Requests\Dashboard\Permission;
use App\Contracts\Requests\Dashboard\Permission\Update as Contract;
use App\Contracts\Rule\UniqueExcept;
use App\Contracts\Services\UniqueExceptPermissionUpdateBridge as UniqueExceptRuleBridge;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Auth\Factory as Auth;
class Update extends FormRequest implements Contract
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Auth $auth): bool
    {
        return $auth
                    ->guard('web')
                    ->user()
                    ->can('edit-permission');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(UniqueExcept $uniqueExcept, UniqueExceptRuleBridge $bridge): array
    {
        $bridge->setExcepts([$this->route()->parameter('id')]);
        $bridge->setOnly($this->name);
        $uniqueExcept->setExistableBridge($bridge);
        return [
            'name'=> ['required','max:64',$uniqueExcept]
        ];
    }
}
