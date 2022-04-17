<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EventoOrden
{
    public $orden;
    use Dispatchable, InteractsWithSockets, SerializesModels;

 
    public function __construct($orden)
    {
        $this->orden = $orden;
    }

    
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
