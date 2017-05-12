<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
class User extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
    'name', 'email', 'password',
    ];
    protected $hidden = [
    'password', 'remember_token',
    ];

    protected $dates = ['created_at','updated_at'];

    public function setCreatedAtAttribute($date) {
        $this->attributes['created_at'] = Carbon::now('Asia/Manila');

//         $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function setUpdatedAtAttribute($date) {
       $this->attributes['updated_at'] = Carbon::now('Asia/Manila');
//         $this->attributes['published_at'] = Carbon::parse($date);
   }

   public function role() { 
    return $this->hasOne('App\Role','role_id');
}

public function hasRole($name) { 
    foreach($this->role as $role){ 
        if ($role->name == $name)
            return true ; 
    }   
    return false ; 
}



}
