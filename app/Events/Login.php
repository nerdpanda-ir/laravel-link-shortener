<?php

namespace App\Events;

use App\Contracts\Model\Userable;
use App\Traits\UserGetterable;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Contracts\Events\Login as Contract;
use App\Traits\Userable as UserableTrait;
class Login implements Contract
{

    use Dispatchable, InteractsWithSockets, SerializesModels , UserableTrait;
    protected Userable $user;

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
