<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Pedido;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function ver_todas(){
        auth()->user()->unreadNotifications->markAsRead();
         $notificaciones = auth()->user()->notifications;
        
 return view('paginas.admin.notificaciones.index', ['notificaciones'=>($notificaciones)]);
     }

     public function eliminar($id){
        $notificaciones = auth()->user()->notifications;
        $noti = $notificaciones->find($id)->delete();
        Alert('Notificación eliminada','success');
        return back();

    }

     //=================== PEDIDOS ===================//
     public function marcar_pedido_leido($notificacion_id, $pedido_id){
        //  dd($notificacion_id, $pedido_id);
        auth()->user()->unreadNotifications->when($notificacion_id, function ($query) use
        ($notificacion_id){
            return $query->where('id',$notificacion_id);
        })->markAsRead();
        $pedido = Pedido::findOrFail($pedido_id);
        return redirect()->route('admin.detallePedidos', $pedido);
    }

    public function marcar_pedidos_leidos(){
        foreach(auth()->user()->unreadNotifications as $noleida){
            if($noleida->type=="App\Notifications\NotificacionPedido"){
                $noleida->markAsRead();
            }
        }
return redirect()->route('admin.pedidos');
    }


    //=================== ORDENES ===================//
     public function marcar_orden_leida($notificacion_id, $orden_id){
        auth()->user()->unreadNotifications->when($notificacion_id, function ($query) use
        ($notificacion_id){
            return $query->where('id',$notificacion_id);
        })->markAsRead();
        $orden = Orden::findOrFail($orden_id);
        return redirect()->route('admin.detallePedidosVendedor', $orden->id);
    }

    public function marcar_ordenes_leidas(){
        foreach(auth()->user()->unreadNotifications as $noleida){
            if($noleida->type=="App\Notifications\NotificacionOrden"){
                $noleida->markAsRead();
            }
        }
return redirect()->route('admin.pedidosVendedor');
    }

  


}
