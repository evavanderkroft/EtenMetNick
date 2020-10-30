<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saved extends Model
{
    protected $fillable=[
        'is_saved'
    ];

    public function HasSaved(){
        return $this->hasMany('App\recipe');
    }
}
