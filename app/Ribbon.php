<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ribbon extends Model
{
    protected $fillable = ['name',
'desc',
];
    public function user()
    {
        return $this->belongsTo(User::class);
    } //
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
