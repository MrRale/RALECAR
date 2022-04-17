<?php

namespace App\Models;

use App\Models\Orden;
use App\Models\Cuenta;
use App\Models\Pedido;
use App\Models\ShoppingCart;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

   
    public $fillable = [
        'id',
        'name',
        'email',
        'password',
        'cedula',
        'ruc',
        'telefono',
        'direccion',
        'empresa'
    ];

   
    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function cuentas(){
        return $this->hasMany(Cuenta::class);
    }

    public function pedidos(){// estos pedidos los genera el cliente en linea
        return $this->hasMany(Pedido::class);
    }

    public function ordenes(){// estas ordenes las genera el vendedor
        return $this->hasMany(Orden::class);
    }
    
    public function shoppingCarts(){
        return $this->hasMany(ShoppingCart::class);
    }
}
