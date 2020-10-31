<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saved extends Model
{
    protected $fillable=[
        'user_id',
        'recipe_id',
        'is_saved'
    ];

    public function Recipe(){
        return $this->hasMany('App\recipe');
    }

    public function User(){
        return $this->hasMany('App\user');
    }
}
