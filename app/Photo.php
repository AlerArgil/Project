<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
   // protected $table = 'photos';
    protected $fillable = ['path',
    ];
    public function ribbon()
    {
        return $this->belongsTo(Ribbon::class);
    }
    public function like_by(){
        return $this->belongsToMany(User::class,'user_photo','photo_id','user_id');
    }
}
