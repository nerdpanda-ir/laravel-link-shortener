<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EditController extends Controller
{
    public function __invoke(string $id , string $name ):View|RedirectResponse
    {
        try {
            dd(__METHOD__,func_get_args());
        }catch (NotFoundHttpException $exception){
            dd($exception);
        }catch (\Throwable $exception){
            dd($exception);
        }
    }
}
