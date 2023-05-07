<?php

namespace App\Http\Controllers\Dashboard\Permission;

use App\Http\Controllers\Controller;
use App\Contracts\PermissionModelContract as Permission;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EditController extends Controller
{

    /**
     * @param string $name
     * @param \App\Models\Permission $model
     * @param ViewFactory $viewFactory
     * @return View|RedirectResponse
     */
    public function __invoke(
        string $name , Permission $model , ViewFactory $viewFactory ,
    ):View|RedirectResponse
    {
        try {
            $permission = $model->where('name','=',$name)->get(['name']);
            if (is_null($permission))
                abort(404);
            dump($permission);
        }catch (\Throwable $exception){
            dump($exception->getMessage());
        }
    }
}
