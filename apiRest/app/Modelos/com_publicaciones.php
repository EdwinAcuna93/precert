<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class com_publicaciones extends Model
{
    protected $table='com_publicaciones';
    
    public function publicaciones()
    {
        return $this->hasMany('App\Publicaciones','foreign_key');
    }
}
