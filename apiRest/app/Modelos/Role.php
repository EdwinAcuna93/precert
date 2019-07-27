<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = ['name', 'description',];


    //
    public function users()
    {
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }
    
    public function roleuser()
    {
        return $this->hasMany('App\Rol_User','foreign_key');
    }
}
