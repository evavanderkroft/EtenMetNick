<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Recipe extends Model
{
    protected $table = "recipes";
    protected $with = ['user'];

    protected $fillable = [
        'title',
        'description',
        'short_description',
        'user_id',
        'category',
        'is_available',
        'is_saved',
        'image'
    ];



    public function User(){
        return $this->belongsTo(User::class);
}

public function Saved(){
        return $this->belongsToMany(Saved::class);
}
}
