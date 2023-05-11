<?php

namespace App\Listeners\LoginEvent;

use App\Contracts\Requests\DoLogin as Request;
use App\Jobs\UserLoginNotifyJob;
use Illuminate\Auth\Events\Login;

class NotifyUserListener
{
    protected Request $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(Login $event): void
    {
        UserLoginNotifyJob::dispatch($event->user,$this->request->ip(),date("Y-m-d H:i:s"));
    }
}
