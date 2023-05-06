<?php

namespace App\Listeners\AuthenticatedEvent;

use Illuminate\Auth\Events\Authenticated;

class LoadUserPermissionsListener
{
    public function __construct()
    {
    }

    public function handle(Authenticated $event): void
    {
        $event->user->load('permissions:permissions.name');
    }
}
