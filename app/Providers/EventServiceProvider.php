<?php

namespace App\Providers;
use App\Events\EventoOrden;
use App\Events\EventoPedido;
use App\Listeners\ListenerOrden;
use App\Listeners\ListenerPedido;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        EventoOrden::class =>[
            ListenerOrden::class,
        ],
        EventoPedido::class =>[
            ListenerPedido::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
