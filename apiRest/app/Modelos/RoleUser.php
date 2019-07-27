<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    //
    protected $table = 'role_user';

    public function user(){
        return $this->belongsTo('App\User','foreign_key');
    } 
    public function roles(){
        return $this->belongsTo('App\Role','foreign_key');
    } 
}
