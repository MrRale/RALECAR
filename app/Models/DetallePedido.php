<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetallePedido extends Model
{
    use HasFactory;
    public $fillable = [
        "id",
        "cantidad",
        "precio",
        "producto_id",
        "pedido_id",
    ];

    public function producto(){
        return $this->belongsTo("App\Models\Producto")->withTrashed();
    }
}
