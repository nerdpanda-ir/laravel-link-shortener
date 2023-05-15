<?php

namespace App\Contracts\Services;

use App\Contracts\PermissionsGetterableContract;
use App\Contracts\UserSetterable;

interface PermissionsFlyWeight extends UserSetterable , PermissionsGetterableContract
{

}
