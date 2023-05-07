<?php

namespace App\Http\Controllers\Dashboard\Permission;

use App\Http\Controllers\Controller;
use App\Contracts\PermissionModelContract as Permission;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory as ViewFactory;

class ViewAllController extends Controller
{

    /**
     * @param \App\Models\Permission $permission
     * @param ViewFactory $viewMaker
     * @return View
     */
    public function __invoke(Permission $permission , ViewFactory $viewMaker):View
    {
        $permissions = $permission->latest()->toSql();
        dd($permissions);
    }
}
