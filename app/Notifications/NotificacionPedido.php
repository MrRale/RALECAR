<?php

namespace App\Notifications;

use App\Models\Pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotificacionPedido extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->line('Nuevo pedido')
        ->line('Se realizado una compra de '.$this->pedido->cantidad.' productos por '.$this->pedido->total.' USD.', url('/'));
      
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        // $vendedor = User::find($this->orden->vendedor_id);
        return [
            "id"=>$this->pedido->id,
            "fecha"=>$this->pedido->fecha,
            "descripcion"=>$this->pedido->descripcion,
            "precio"=>$this->pedido->precio,
            "ciudad"=>$this->pedido->ciudad,
            "costo_envio"=>$this->pedido->costo_envio,
            "direccion"=>$this->pedido->direccion,
            "empresa"=>$this->pedido->empresa,
            "cantidad"=>$this->pedido->cantidad,
            "estado_pedido"=>$this->pedido->estado_pedido,
            "user_id"=>$this->pedido->user_id,
            "nombre"=>$this->pedido->user->name,
            "factura_id"=>$this->pedido->factura_id,
            "total"=>$this->pedido->total,
            "icon"=>"fa-shopping-cart",
            "titulo"=>"Nuevo pedido en linea"
        ];
    }
}
