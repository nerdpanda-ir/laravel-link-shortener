<?php

namespace App\Notifications;

use App\Contracts\UserableContract;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Notifications\Notification;
use App\Contracts\UserLoginNotificationContract as Contract;
use App\Contracts\LoginMailContract;

class UserLoginNotification extends Notification implements Contract
{
    protected Mailable $mail;
    protected string $ip;
    public function __construct(LoginMailContract $mail)
    {
        $this->mail = $mail;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail(UserableContract $notifiable): Mailable
    {
        return $this->mail
                    ->to($notifiable->email)
                    ->with([
                        'name'=> $notifiable->name,
                        'ip' => $this->ip
                    ]);
    }

    public function toArray($notifiable): array
    {
        return [];
    }
    /**
     * @param string $ip
     */
    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }
}
