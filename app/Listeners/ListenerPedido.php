<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\NotificacionPedido;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class ListenerPedido
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        User::role('Administrador')
        // ->whereNotIn('id',$event->orden->user_id)
        ->each(function(User $user) use ($event){
            Notification::send($user, new NotificacionPedido($event->pedido));
        });
    }
}
