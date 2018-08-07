<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'email','login', 'password', 'points'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function ribbons()
    {
        return $this->hasMany(Ribbon::class);
    }
    public function like_to(){
    return $this->belongsToMany(Photo::class,'user_photo','user_id','photo_id');
}
}
