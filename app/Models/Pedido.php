<?php

namespace App\Models;

use App\Models\Abono;
use App\Events\EventoPedido;
use App\Models\DetallePedido;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable=[
        "fecha",
        "descripcion",
        "precio",
        "ciudad",
        "costo_envio",
        "direccion",
        "empresa",
        "cantidad",
        "estado_pedido",
        "user_id",
        "factura_id",
        "total"
    ];


    public function detalle_pedidos(){
        return $this->hasMany(DetallePedido::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public static function make_pedido_notification($pedido){
        event(new EventoPedido($pedido));
     }

    // public function abonos(){
    //     return $this->hasMany(Abono::class);
    // }

    
}
