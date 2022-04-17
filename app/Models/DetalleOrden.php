<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    use HasFactory;
    public $fillable = [
        "id",
        "cantidad",
        "precio",
        "producto_id",
        "orden_id",
    ];

    public function producto(){
        return $this->belongsTo("App\Models\Producto")->withTrashed();
    }
}
