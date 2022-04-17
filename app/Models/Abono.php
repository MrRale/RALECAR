<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Orden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Abono extends Model
{
    use HasFactory;
    public $fillable=[
        "fecha",
        "valor",
        "orden_id"
    ];

    public function orden(){
        return $this->belongsTo(Orden::class);
    }

 
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
