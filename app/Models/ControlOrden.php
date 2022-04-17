<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlOrden extends Model
{
    use HasFactory;
    public $fillable=[
        "cuota",
        "interes",
        "meses",
        "fecha",
        "orden_id",
    ];
}
