<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Providers\BroadcastServiceProvider;
use Illuminate\Broadcasting\BroadcastEvent;

class TestEvent implements ShouldBroadcast
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function broadcastOn()
    {
        return ['register'];
    }

    public function broadcastAs()
    {
        return 'demo.channel';
    }

}
