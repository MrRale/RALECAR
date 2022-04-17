<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use Illuminate\Database\Eloquent\SoftDeletes;
class Inventario extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $fillable = [
        'nombre'
    ];

    public function productos(){
        return $this->hasMany(Producto::class)->withTrashed();
    }

}
