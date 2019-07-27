<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
    {
    public function user(){
        return $this->belongsTo('App\User','foreign_key');
    } 
    public function com_eventos()
    {
        return $this->belongsTo('App\com_eventos','foreign_key');
    }


}
