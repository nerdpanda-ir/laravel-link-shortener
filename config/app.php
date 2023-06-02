<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store'  => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        \App\Providers\Model\UserableServiceProvider::class ,
        \App\Providers\Factories\UserServiceProvider::class ,
        \App\Providers\Seeder\UserServiceProvider::class ,
        \App\Providers\Model\PermissionServiceProvider::class ,
        \App\Providers\Factories\PermissionServiceProvider::class ,
        \App\Providers\Seeder\PermissionServiceProvider::class ,
        \App\Providers\Factories\RoleServiceProvider::class ,
        \App\Providers\Seeder\RoleServiceProvider::class ,
        \App\Providers\Seeder\PermissionRoleServiceProvider::class ,
        \App\Providers\Model\RoleServiceProvider::class ,
        \App\Providers\Seeder\RoleUserServiceProvider::class ,
        \App\Providers\Seeder\PermissionUserServiceProvider::class ,
        \App\Providers\Request\DoLoginServiceProvider::class ,
        \App\Providers\Mails\LoginServiceProvider::class ,
        \App\Providers\Notifications\UserLoginServiceProvider::class ,
        \App\Providers\Services\PermissionsToArrayServiceProvider::class ,
        \App\Providers\Services\PermissionsFlyWeightServiceProvider::class,
        \App\Providers\Services\PermissionManagerServiceProvider::class ,
        \App\Providers\Services\Gates\SystemMonitorServiceProvider::class ,
        \App\Providers\Services\Gates\PermissionsServiceProvider::class ,
        \App\Providers\Request\Dashboard\Permission\StoreRequestServiceProvider::class ,
        \App\Providers\Services\DateServiceProvider::class ,
        \App\Providers\Rule\UniqueExceptServiceProvider::class ,
        \App\Providers\Request\Dashboard\Permission\UpdateServiceProvider::class ,
        \App\Providers\Services\UniqueExceptImplBridge::class ,
        \App\Providers\Observers\LoggerServiceProvider::class ,
        \App\Providers\Services\Gates\RoleServiceProvider::class ,
        \App\Providers\Exceptions\FailCrudServiceProvider::class ,
        \App\Providers\Services\ResponseVisitors\DeleteActionServiceProvider::class ,
        \App\Providers\Redirectors\PermissionServiceProvider::class ,
        \App\Providers\Services\ResponseVisitors\NotFoundServiceProvider::class ,
        \App\Providers\Services\ResponseVisitors\EditActionServiceProvider::class ,
        \App\Providers\Services\ResponseVisitors\SaveActionServiceProvider::class ,
        \App\Providers\Services\ResponseVisitors\UpdateActionServiceProvider::class ,
        \App\Providers\Events\Login::class,
        \App\Providers\Redirectors\Dashboard::class ,
        \App\Providers\Services\ResponseVisitors\ViewAllActionServiceProvider::class ,
        \App\Providers\Redirectors\RoleServiceProvider::class ,
        \App\Providers\Services\ResponseVisitors\CreateActionServiceProvider::class ,
        \App\Providers\Request\Dashboard\Role\SaveServiceProvider::class ,
        \App\Providers\Rule\ArrayIsExistsInTableServiceProvider::class ,
        \App\Providers\Services\MessageBuilders\Rule\Dashboard\Role\ArrayIsExistsInTableServiceProvider::class ,
        \App\Providers\Services\SaveRoleHasPermissionStrategyServiceProvider::class ,
        \App\Providers\Services\SaveRoleHasNoPermissionStrategyServiceProvider::class ,
        \App\Providers\Services\RoleSaveStrategyContainerServiceProvider::class ,
        \App\Providers\Request\Dashboard\Role\UpdateServiceProvider::class ,
        \App\Providers\Services\ResponseVisitors\Rule\ExplodeArrayExistsInTableServiceProvider::class ,
        \App\Providers\Services\Gates\UserServiceProvider::class ,
        \App\Providers\Redirectors\UserServiceProvider::class ,
        \App\Providers\Request\Dashboard\User\SaveServiceProvider::class ,
        \App\Providers\Services\MessageBuilders\Rule\Dashboard\User\ArrayIsExitstsInTableServiceProvider::class ,
        \App\Providers\Services\AuthenticatedUserServiceProvider::class ,
        \App\Providers\Request\Dashboard\User\UpdateServiceProvider::class ,
        \App\Providers\Services\Strategies\UserUpdate\CantAttachRoleToUserServiceProvider::class ,
        \App\Providers\Services\Strategies\UserUpdate\HasRolesServiceProvider::class ,
        \App\Providers\Services\Strategies\UserUpdate\HasNoRolesServiceProvider::class ,
        \App\Providers\Services\UserUpdateStrategyFactoryServiceProvider::class ,
        \App\Providers\Request\DoRegisterServiceProvider::class ,
        \App\Providers\Redirectors\HomeServiceProvider::class ,
        \App\Providers\Services\ResponseVisitors\UserRegisterActionServiceProvider::class ,
        \App\Providers\Services\UserPermissionsRepositoryServiceProvider::class ,
    ])->toArray(),

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
        'HomeRedirector' => \App\Facades\Redirectors\Home::class ,
        'DateServiceFacade' => \App\Facades\DateServiceFacade::class,
        'UserRedirector' => \App\Facades\Redirectors\User::class ,
        'CreateActionResponseVisitor' => \App\Facades\Services\ResponseVisitors\CreateAction::class ,
        'EditActionResponseVisitor' => \App\Facades\Services\ResponseVisitors\EditAction::class ,
        'UpdateActionResponseVisitor' => \App\Facades\Services\ResponseVisitors\UpdateAction::class ,
        'DeleteActionResponseVisitor' => \App\Facades\Services\ResponseVisitors\DeleteAction::class ,
        'NotFoundResponseVisitor' => \App\Facades\Services\ResponseVisitors\NotFound::class ,
        'RoleModel' => \App\Facades\Models\Role::class ,
        'AuthenticatedUser' => \App\Facades\Services\AuthenticatedUser::class ,
        'UserModel' => \App\Facades\Models\User::class ,
    ])->toArray(),

];
