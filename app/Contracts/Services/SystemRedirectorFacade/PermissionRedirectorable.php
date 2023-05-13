<?php

namespace App\Contracts\Services\SystemRedirectorFacade;

use App\Contracts\Redirectors\Permission;

interface PermissionRedirectorable
{
    public function permission():Permission;
}
