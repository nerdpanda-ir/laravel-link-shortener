<?php

namespace App\Contracts\Services;
use App\Contracts\DatabaseManagerGetterable;
use App\Contracts\Model\UserableModel;
use \App\Contracts\Services\UserPermissionsRepository as Repository;
use App\Contracts\Userable;
interface LazyPermissionManagerStrategy extends PermissionManager , Userable , DatabaseManagerGetterable
{
    public function getRepository():Repository;
    public function setRepository(Repository $repository);
}
