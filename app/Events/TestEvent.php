<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;

class TestEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets;

    public $message;
    public $time;

    public function __construct($message = null)
    {
        $this->message = $message ?? 'Тестовое сообщение';
        $this->time = now()->toDateTimeString();
    }

    public function broadcastOn()
    {
        return new Channel('public-channel');
    }

    public function broadcastAs()
    {
        return 'test.event';
    }
}