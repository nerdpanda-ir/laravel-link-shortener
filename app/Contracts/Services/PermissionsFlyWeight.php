<?php

namespace App\Contracts\Services;

use App\Contracts\PermissionsGetterableContract;
use App\Contracts\UserSetterableContract;

interface PermissionsFlyWeight extends UserSetterableContract , PermissionsGetterableContract
{

}
