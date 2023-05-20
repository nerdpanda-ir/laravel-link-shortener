<?php

namespace App\Http\Controllers\Dashboard\Role;

use App\Contracts\Services\RoleSaveStrategyContainer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Role\Save  as Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SaveController extends Controller
{
    /**
     * @param Request $request
     * @param \Illuminate\Database\DatabaseManager $databaseManager
     * @param \App\Models\Role $role
     * @param \App\Models\Permission $permission
     * @return void
     * @throws \Throwable
     */
    public function __invoke(RoleSaveStrategyContainer $strategyContainer ):RedirectResponse
    {
        return $strategyContainer->getStrategy()->save();
    }
}
