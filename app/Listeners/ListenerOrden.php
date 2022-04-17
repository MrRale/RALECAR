<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\NotificacionOrden;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class ListenerOrden
{
  
    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        User::role('Administrador')
        // ->whereNotIn('id',$event->orden->user_id)
        ->each(function(User $user) use ($event){
            Notification::send($user, new NotificacionOrden($event->orden));
        });
    }
}
