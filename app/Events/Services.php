<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Services implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $services;

    /**
     * Create a new event instance.
     *
     * @param $services
     */
    public function __construct($services)
    {
        $this->services = $services;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['clatech-channel'];
    }

    public function broadcastAs()
    {
        return 'clatech-event';
    }
}
