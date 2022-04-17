<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShoppingCartDetail extends Model
{
    use HasFactory;
    protected $fillable=[
        "cantidad",
        "precio",
        "shopping_cart_id",
        "producto_id"
    ];

    public function producto(){
        return $this->belongsTo(Producto::class)->withTrashed();
    }
    
}
