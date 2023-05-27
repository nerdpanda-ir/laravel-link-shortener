<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Contracts\Services\Gates\Permission;
use App\Contracts\Services\Gates\Role;
use App\Contracts\Services\Gates\SystemMonitor;
use App\Contracts\Services\Gates\User;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];
    // @todo has duplicated codes for crud gates !!!
    protected $gates = [
        'see-ram-usage' => [SystemMonitor::class,'ramUsage'] ,
        'see-disk-usage' => [SystemMonitor::class,'diskUsage'] ,
        'view-all-permissions' => [Permission::class,'viewAll'] ,
        'create-permission' => [Permission::class , 'create'] ,
        'delete-permission' => [Permission::class , 'delete'] ,
        'edit-permission' => [Permission::class , 'edit'] ,
        'view-all-roles' => [Role::class , 'viewAll'] ,
        'create-role' => [Role::class , 'create'] ,
        'edit-role' => [Role::class , 'edit'] ,
        'delete-role' => [Role::class , 'delete'] ,
        'view-all-users' => [User::class, 'viewAll'] ,
        'create-user' => [User::class, 'create'] ,
        'edit-user' => [User::class, 'edit'] ,
        'delete-user' => [User::class , 'delete'] ,
        'set-password-for-user' => [User::class , 'setPasswordForUser'] ,
        'attach-role-to-user' => [User::class , 'attachRoleToUser'] ,
        'verify-user-email' => [User::class , 'verifyUserEmail']
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(Gate $gateManager): void
    {
        foreach ($this->gates as $gateName=>$gateAction)
            $gateManager->define($gateName,$gateAction);
    }
}
