<?php

namespace App\Models;

use App\Models\Cuenta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ControlCuenta extends Model
{
    use HasFactory;

    public $fillable=[
        "cuota",
        "interes",
        "meses",
        "fecha",
        "orden_id",
    ];

    // public function cuenta(){
    //     return $this->belongsTo(Cuenta::class);
    // }
}
