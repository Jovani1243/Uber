<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tienda extends Model
{
    use HasFactory;
    protected $fillable = ['id','nombre_vehiculo','precio','vehiculo'];
}
