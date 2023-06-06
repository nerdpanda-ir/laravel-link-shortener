<?php

namespace App\Http\Requests\Dashboard\AdminLink;

use App\Contracts\Rule\UniqueExcept;
use App\Contracts\Services\AuthenticatedUser;
use App\Contracts\Services\UniqueExceptImplBridge;
use Illuminate\Foundation\Http\FormRequest;
use App\Contracts\Requests\Dashboard\AdminLink\Update as Contract;
use Illuminate\Session\SessionManager;

class Update extends FormRequest implements Contract
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(AuthenticatedUser $authenticatedUser): bool
    {
        return $authenticatedUser->getUser()->can('edit-link');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(
        UniqueExcept $uniqueExceptRule,UniqueExceptImplBridge $uniqueExceptRuleBridge ,
        SessionManager $sessionManager ,
    ): array
    {
        $oldLinkSummary = $sessionManager->get('old_link_summary');
        $summaryColumn = 'summary';
        $uniqueExceptRuleBridge->setTableName('links')->setExceptColumn($summaryColumn)
                               ->setExcepts([$oldLinkSummary])->setOnlyColumn($summaryColumn)
                               ->setOnly($this->get('summary'));
        $uniqueExceptRule->setExistableBridge($uniqueExceptRuleBridge);

        return [
            'url'=>'required|url|max:2000' ,
            'summary' => ['required','max:255',$uniqueExceptRule] ,
            'view_count'=>'int|max:18446744073709551615|min:0' ,
        ];
    }
}
