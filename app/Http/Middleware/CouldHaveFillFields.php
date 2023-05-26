<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class CouldHaveFillFields
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(
        Request $request, Closure $next , string $fields ,
        string $permissions
    ): Response
    {
        $shouldNoFilledFields = [];
        /** @var User $user*/
        $user = \AuthenticatedUser::getUser();
        $fieldsArray = explode('|',trim($fields));
        $permissionsArray = explode('|',trim($permissions));
        foreach ($fieldsArray as $fieldKey=> $fieldItem)
            if($request->query->has($fieldItem) && $user->cant($permissionsArray[$fieldKey]))
                $shouldNoFilledFields[] = $fieldItem;
        if (empty($shouldNoFilledFields))
            return $next($request);
        $errors = [];
        foreach ($shouldNoFilledFields as $shouldNoFilledField)
            $errors[] = "you cant fill $shouldNoFilledField because you`re no authorize for this action !!!";
        return Redirect::back()->with('system.messages.error',$errors);
    }
}
