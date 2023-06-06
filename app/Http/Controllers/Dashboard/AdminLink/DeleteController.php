<?php

namespace App\Http\Controllers\Dashboard\AdminLink;

use App\Contracts\Exceptions\FailCrud as FailCrudContract;
use App\Contracts\Model\Link;
use App\Exceptions\FailCrud;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteController extends Controller
{

    /**
     * @param \App\Models\Link $link
     * @return RedirectResponse
     */
    public function __invoke(string $id , Request $request , Link $linkModel , ):RedirectResponse
    {
        try {
            dd(__METHOD__);
            #$link = $linkModel->where('id','=',$id)->first(['id','original']);
        }catch (NotFoundHttpException $exception){
            dd($exception);
        }catch (FailCrudContract $exception){
            dd($exception);
        }catch (\Throwable $exception){}
    }
}
