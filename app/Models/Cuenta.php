<?php

namespace App\Models;

use App\Models\User;
use App\Models\Abono;
use App\Models\ControlCuenta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cuenta extends Model
{
    use HasFactory;

    public $fillable=[
        "saldo",
        "abono",
        "user_id",
        "fecha"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function control_cuenta(){
        return $this->hasOne(ControlCuenta::class);
    }

    // public function abonos(){
    //     return $this->hasMany(Abono::class);
    // }
}
