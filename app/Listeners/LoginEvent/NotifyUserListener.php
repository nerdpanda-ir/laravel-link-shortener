<?php

namespace App\Listeners\LoginEvent;

use Illuminate\Auth\Events\Login;

class NotifyUserListener
{
    public function __construct()
    {
    }

    public function handle(Login $event): void
    {

    }
}
