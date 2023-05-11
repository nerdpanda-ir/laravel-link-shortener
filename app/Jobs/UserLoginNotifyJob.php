<?php

namespace App\Jobs;

use App\Contracts\Model\Userable as User;
use App\Contracts\Notifications\UserLogin as UserLoginNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UserLoginNotifyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $deleteWhenMissingModels = true;
    protected User $user;
    protected string $ip;
    protected string $dateTime;
    /**
     * Create a new job instance.
     */
    public function __construct(User $user , string $ip , string $dateTime)
    {
        $this->user = $user;
        $this->ip = $ip;
        $this->dateTime = $dateTime;
    }

    /**
     * Execute the job.
     */
    public function handle(UserLoginNotification $notification): void
    {
        $notification->setIp($this->ip);
        $notification->setDateTime($this->dateTime);
        $this->user->notify($notification);
    }

}
