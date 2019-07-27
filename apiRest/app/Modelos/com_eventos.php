<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class com_eventos extends Model
{
    protected $table='com_eventos';
    
    public function eventos()
    {
        return $this->hasMany('App\Eventos','foreign_key');
    }
}
