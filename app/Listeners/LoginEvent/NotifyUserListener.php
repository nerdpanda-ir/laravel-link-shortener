<?php

namespace App\Listeners\LoginEvent;

use App\Contracts\Services\DateService;
use Illuminate\Http\Request;
use App\Jobs\UserLoginNotifyJob;
use Illuminate\Auth\Events\Login;

class NotifyUserListener
{
    protected Request $request;
    protected DateService $dateService;
    public function __construct(Request $request , DateService $dateService)
    {
        $this->request = $request;
        $this->dateService = $dateService ;
    }

    public function handle(Login $event): void
    {
        UserLoginNotifyJob::dispatch($event->user,$this->request->ip(),date("Y-m-d H:i:s"));
    }
}
