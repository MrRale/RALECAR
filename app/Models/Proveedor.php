<?php

namespace App\Models;

use App\Models\Deuda;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Proveedor extends Model
{
    use HasFactory;use SoftDeletes;
    public $fillable = [
        "nombre",
        "empresa",
        "telefono",
        "direccion"
    ];

    public function deudas(){
        return $this->hasMany(Deuda::class);
    }
}
