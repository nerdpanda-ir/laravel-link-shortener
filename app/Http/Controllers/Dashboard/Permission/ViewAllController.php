<?php

namespace App\Http\Controllers\Dashboard\Permission;

use App\Contracts\Model\Permission as Permission;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;

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
                        ->paginate(25);
        return $viewMaker->make('page.dashboard.permission.view-all',compact('permissions'));
    }
}
