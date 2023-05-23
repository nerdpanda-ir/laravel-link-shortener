<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CreateController extends Controller
{
    public function __invoke():RedirectResponse|View
    {
        try {
            return \view('page.dashboard.user.create');
        }catch (\Throwable $exception){
            Log::emergency(
                trans('log.crud.create.throw_exception', ['item' => 'user'])
            );
            report($exception);
            $response = \UserRedirector::viewAll();
            return \CreateActionResponseVisitor::throwException(
                $response , 'user'
            );
        }
    }
}
