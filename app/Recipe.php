<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Auth;

class Recipe extends Model
{
    protected $table = "recipes";
//    protected $with = ['user'];

    protected $fillable = [
        'title',
        'description',
        'short_description',
//        'user_id',
        'category',
        'is_available',
//        'is_saved',
        'image'
    ];

    protected $guarded=[
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function scopeWithLikes(Builder $query){
        $query->leftJoinSub(
            'select recipe_id, sum(liked) likes, sum(!liked) dislikes from likes group by recipe_id',
            'likes',
            'likes.recipe_id',
            'recipes.id'
        );
    }

    public function like($user = null, $liked=true)
    {
        $this->likes()->updateOrCreate(
            [
            'user_id' => $user ? $user->id : Auth()->id(),
        ],
            [
            'liked' => $liked
        ]);
    }

    public function dislike($user = null){
        return $this->like($user, false);
    }

    public function isLikedBy2(){

    }

    public function isLikedBy(){
        $user = auth()->user();
        return (bool) $user->likes
            ->where('recipe_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function isDislikedBy(){
        $user = auth()->user();
        return (bool) $user->likes
            ->where('recipe_id', $this->id)
            ->where('liked', false)
            ->count();
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
