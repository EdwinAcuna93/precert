<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'Codigo', 'Nombre', 'Integrantes','Estado'
    ];
}
