<?php

namespace App\Providers;

use App\Contracts\Events\LinkShowed;
use App\Events\Login;
use App\Listeners\AuthenticatedEvent\LoadUserPermissionsListener;
use App\Listeners\Job\LogFailedListener;
use App\Listeners\Job\LogProcessedListener;
use App\Listeners\Job\LogProcessingListener;
use App\Listeners\LinkShowed\IncreaseLinkViewCountListener;
use App\Listeners\LoginEvent\LoggerListener;
use App\Listeners\LoginEvent\NotifyUserListener;
use App\Listeners\LogoutEvent\UserLogoutLoggerListener;
use App\Listeners\QueryExecutedEvent\QueryDisplayOnConsoleListener;
use App\Listeners\QueryExecutedEvent\QueryDisplayOnWebListener;
use App\Listeners\QueryExecutedEvent\QueryLoggerListener;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Observers\Logger;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Failed::class => [
            \App\Listeners\LoginFailEvent\LoggerListener::class
        ],
        Login::class => [
            LoggerListener::class ,
            NotifyUserListener::class ,
        ],
        Logout::class=> [
            UserLogoutLoggerListener::class
        ],
        JobProcessing::class => [
            LogProcessingListener::class
        ],
        JobProcessed::class => [
            LogProcessedListener::class
        ],
        JobFailed::class => [
            LogFailedListener::class
        ],
        Authenticated::class => [
        ],
        QueryExecuted::class => [
            QueryLoggerListener::class , QueryDisplayOnWebListener::class ,
            QueryDisplayOnConsoleListener::class
        ],
        LinkShowed::class => [
            IncreaseLinkViewCountListener::class
        ]
    ];
    protected $observers = [
        Permission::class => [
            Logger::class
        ],
        Role::class => [
            Logger::class ,
        ],
        User::class => [
            Logger::class ,
        ]
    ];
    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
