<?php

namespace App\Contracts\Services\SystemRedirectorFacade;

use App\Contracts\Redirectors\Dashboard\Permission;

interface PermissionRedirectorable
{
    public function permission():Permission;
}
