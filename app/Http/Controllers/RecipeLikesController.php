<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeLikesController extends Controller
{
public function store(Recipe $recipe){
    dd('hoi');
$recipe->like(auth()->user());

return back();
}
public function destroy(Recipe $recipe){
    $recipe->dislike(auth()->user());

    return back();
}
}
