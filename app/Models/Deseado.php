<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deseado extends Model
{
    use HasFactory;
    public $fillable=[
        "producto_id",
        "user_id",
    ];
}
