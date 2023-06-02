<?php
namespace App\Services;

use App\Contracts\Services\LazyPermissionManagerStrategy as Contract;
use App\Contracts\Services\UserPermissionsRepository as Repository;
use App\Contracts\Model\Userable;
use App\Traits\DatabaseManagerGetterable;
use App\Traits\Userable as UserableTrait;
use Illuminate\Database\ConnectionResolverInterface as DatabaseManager;
use Illuminate\Database\Query\Builder;


abstract class LazyPermissionManagerStrategy implements Contract
{
    use UserableTrait , DatabaseManagerGetterable;
    protected Repository $repository;
    protected Userable $user;
    protected DatabaseManager $databaseManager;
    public function __construct(DatabaseManager $databaseManager , Repository $repository)
    {
        $this->databaseManager  = $databaseManager ;
        $this->repository = $repository;
    }

    public function has(string $permission): bool
    {
        if (!isset($this->user))
            return false;
        if ($this->repository->has($permission))
            return $this->repository->get($permission);

        $hasPermission = $this->getDatabaseManager()->table('role_user')
                              ->distinct()->select('permissions.name')
                              ->join('permission_role','permission_role.role_id','=','role_user.role_id')
                              ->join('permissions','permissions.id','=','permission_role.permission_id')
                              ->where('role_user.user_id','=',$this->getUser()->id)
                              ->where('permissions.name','=',$permission)->exists();

        $this->getRepository()->put($permission,$hasPermission);
        return $hasPermission;
    }

    public function getRepository(): Repository
    {
        return $this->repository;
    }

    public function setRepository(Repository $repository): void
    {
        $this->repository = $repository;
    }

}
