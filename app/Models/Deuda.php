<?php

namespace App\Models;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deuda extends Model
{
    use HasFactory;
    public $fillable = [
        "saldo",
        "fecha",
        "proveedor_id"
    ];

    public function proveedor(){
        return $this->belongsTo(Proveedor::class)->withTrashed();
    }

    public function deuda_total(){
        $total = 0;
        $deudas = Deuda::all();
        foreach($deudas->saldo as $valor){
            $total = $total + $valor;
        }
        return $total;
    }
}
