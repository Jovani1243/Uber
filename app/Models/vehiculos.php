<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculos extends Model
{
    use HasFactory;
    protected $fillable = ['id','modelo_vehiculo','marca_vehiculo','año_vehiculo'];
}
