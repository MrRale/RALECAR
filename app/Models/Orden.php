<?php

namespace App\Models;

use App\Models\Factura;
use App\Models\ControlOrden;
use App\Events\EventoOrden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orden extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public $fillable =[
        "id",
        "cedula",
        "ruc",
        "telefono",
        "nombres",
        "apellidos",
        "email",
        "fecha",
        "descripcion",
        "cantidad",
        "truc",
        "total_pagar",
        "estado_pedido",
        "empresa",
        "ciudad",
        "direccion",
        "costo_envio",
        "vendedor_id",
        "user_id",
        "meses",
        // "subtotal_iva",
        "subtotal",
        "factura_id",
        "saldo"
    ];

    // public function image(){
    //     return $this->morphOne(Image::class, 'imageable');
    // }

    public static function make_order_notification($orden){
        event(new EventoOrden($orden));
     }

    public function detalle_ordenes(){
        return $this->hasMany(DetalleOrden::class);
    }

    public function control_orden(){
        return $this->hasOne(ControlOrden::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function factura(){
        return $this->hasOne(Factura::class);
    }

}
