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
        $permissions = $permission
                        ->with('creator:id,name')
                        ->latest()->latest('updated_at')
                        ->oldest('name')
                        ->paginate(1,['created_by','name','created_at','updated_at']);
        return $viewMaker->make('page.dashboard.permission.view-all',compact('permissions'));
    }
}
