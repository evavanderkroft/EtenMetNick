<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;

//
    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function Recipe(){
        return $this->belongsToMany('App\Recipe');
    }


    // fillables are the inputfields for the database that can be filled in, for example, a form.
    protected $fillable = [
        'name', 'email', 'password', 'is_admin',
    ];

    // hidden are the inputfields that should be hidden for arrays.
    protected $hidden = [
        'password', 'remember_token',
    ];


    //the attributes that should be native types.
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


}
