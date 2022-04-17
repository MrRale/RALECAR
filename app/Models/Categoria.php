<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $fillable=[
        "nombre",
        "descripcion",
    ];

    public function productos(){
        return $this->hasMany(Producto::class);
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
