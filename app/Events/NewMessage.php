<?php

namespace App\Events;

use App\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\Broadcaster;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\User;

class NewMessage implements ShouldBroadcast
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $user;

    public function __construct(Message $message, $user)
    {
        $this->message = $message;
        $this->user = $user;
    }

    public function broadcastOn()
    {
        return ['Chat'];
    }

    public function broadCastAs()
    {
        return 'demo.message';
    }

}
