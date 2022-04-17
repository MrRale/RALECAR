<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Orden;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NotificacionOrden extends Notification
{
    use Queueable;

    public function __construct(Orden $orden)
    {
        $this->orden = $orden;
    }
  
    public function via($notifiable)
    {
        // return ['mail'];
        return ['database'];
    }

   
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->line('Nueva orden')
        ->line($this->orden->nombres.' '.$this->orden->apellidos.' ha realizado una compra de '.$this->orden->cantidad.' productos por '.$this->orden->total_pagar.' USD.', url('/'));
        // ->action('Ver detalle de la compra',url('/datos-cliente/'.$this->orden->id));
    }

   
    public function toArray($notifiable)
    {
        $vendedor = User::find($this->orden->vendedor_id);
        return [
            "id"=>$this->orden->id,
            "cedula"=>$this->orden->cedula,
            "ruc"=>$this->orden->ruc,
            "telefono"=>$this->orden->telefono,
            "nombres"=>$this->orden->nombres,
            "apellidos"=>$this->orden->apellidos,
            "email"=>$this->orden->email,
            "fecha"=>$this->orden->fecha,
            "descripcion"=>$this->orden->descripcion,
            "cantidad"=>$this->orden->cantidad,
            "total"=>$this->orden->total,
            "estado_pedido"=>$this->orden->estado_pedido,
            "empresa"=>$this->orden->empresa,
            "ciudad"=>$this->orden->ciudad,
            "direccion"=>$this->orden->direccion,
            "costo_envio"=>$this->orden->costo_envio,
            "vendedor_id"=>$this->orden->vendedor_id,
            "nombre_vendedor"=>$vendedor->name,
            "user_id"=>$this->orden->user_id,
            "subtotal_iva"=>$this->orden->subtotal_iva,
            "subtotal"=>$this->orden->subtotal,
            "factura_id"=>$this->orden->factura_id,
            "saldo"=>$this->orden->saldo,
            "icon"=>"fa-headset",
            "titulo"=>"Nueva orden"
        ];
    }
}
