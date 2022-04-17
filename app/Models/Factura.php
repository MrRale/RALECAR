<?php

namespace App\Models;

use App\Models\Orden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Factura extends Model
{
    use HasFactory;
    public $fillable = [
        "fecha",
        "iva",
        "costo_envio",
        "total",
    ];

    public function orden(){
        return $this->belongsTo(Orden::class);
    }
}
