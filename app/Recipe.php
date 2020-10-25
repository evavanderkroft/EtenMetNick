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
        'image'
    ];

    public static function table(string $string)
    {
    }

    public function User(){
        return $this->belongsTo(User::class);
}

}
