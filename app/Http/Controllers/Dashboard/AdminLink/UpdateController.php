<?php

namespace App\Http\Controllers\Dashboard\AdminLink;

use App\Contracts\Exceptions\FailCrud as FailCrudExceptionContract;
use App\Contracts\Requests\Dashboard\AdminLink\Update as Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateController extends Controller
{
    public function __invoke(string $id , Request $request):RedirectResponse
    {
        try {
            // get link from db
            //if is null throw not found exception
            //set inputes to model
            //save
            // if update is false throw fail crud
            // is update is ok throw redirect response
            dd("here");
        }catch (NotFoundHttpException $exception){
            dd($exception);
        }catch (FailCrudExceptionContract $exception){
            dd($exception);
        }catch (\Throwable $exception){
            dd($exception);
        }
    }
}
