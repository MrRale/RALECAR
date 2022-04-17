<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbonoProveedor extends Model
{
    use HasFactory;

    public $fillable=[
        "monto",
        "fecha",
        "deuda_id"
    ];

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
