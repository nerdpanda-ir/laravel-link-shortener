<?php

namespace App\Listeners\LoginEvent;

use App\Contracts\DateServiceGetterable;
use App\Contracts\Services\DateService;
use Illuminate\Http\Request;
use App\Jobs\UserLoginNotifyJob;
use App\Contracts\Events\Login;
use App\Traits\DateServiceGetterable as DateServiceGetterableTrait;
class NotifyUserListener implements DateServiceGetterable
{
    use DateServiceGetterableTrait;
    protected Request $request;
    protected DateService $dateService;
    public function __construct(Request $request , DateService $dateService)
    {
        $this->request = $request;
        $this->dateService = $dateService ;
    }

    public function handle(Login $event): void
    {
        UserLoginNotifyJob::dispatch(
            $event->getUser(),$this->request->ip(),$this->getDateService()->date()
        );
    }
}
