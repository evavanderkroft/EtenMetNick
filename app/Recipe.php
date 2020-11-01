<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Auth;

class Recipe extends Model
{
    protected $table = "recipes";


// fillables are the inputfields for the database that can be filled in, for example, a form.
    protected $fillable = [
        'title',
        'description',
        'short_description',
        'category',
        'is_available',
        'image'
    ];
    // this was necessary to make for the liked function. Not used. Guarded is reverse of fillable, and specifies which fields are not mass assignable.
    protected $guarded=[];

    // one to many relationship user with recipe. A recipe is made by a user, but there can't be more than one user to a recipe.
    public function User(){
        return $this->belongsTo(User::class);
    }


    //a many to many relationship recipe with likes. A recipe can have multiple likes by multiple people, and you can like multiple recipes.
    public function likes(){
        return $this->hasMany(Like::class);
    }

    //function where a made query is used to make sure you figure out if the function IsLikedBy is able to work out and how many liked and dislikes the recipe has.
    public function scopeWithLikes(Builder $query){
        $query->leftJoinSub(
            'select recipe_id, sum(liked) likes, sum(!liked) dislikes from likes group by recipe_id',
            'likes',
            'likes.recipe_id',
            'recipes.id'
        );
    }

    //function to be able to like a recipe through a button. User id had to be the same as the current users'id.
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

    // function to be able to dislike a recipe through a button.
    public function dislike($user = null){
        return $this->like($user, false);
    }

    // function to find out if the button liked is really liked by the current user. If so, it will change the color of the button.
    public function isLikedBy(){
        $user = auth()->user();
        return (bool) $user->likes
            ->where('recipe_id', $this->id)
            ->where('liked', true)
            ->count();
    }
    // function to find out if the button liked is disliked by the current user. If so, it will change the color of the button.
    public function isDislikedBy(){
        $user = auth()->user();
        return (bool) $user->likes
            ->where('recipe_id', $this->id)
            ->where('liked', false)
            ->count();
    }

}
