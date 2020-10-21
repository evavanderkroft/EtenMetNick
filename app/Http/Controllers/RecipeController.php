<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use Auth;

class RecipeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
}
//    public function index(){
//        return
//    }

    public function index()
    {
     $recipes = Recipe::All();
return view('recipes.index',compact('recipes'));

//        $recipes = Recipe::table('recipes')->get();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { if(Auth::check()) {
        return view('recipes.create');
    } else {
        return view('recipes.index');
    }}


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Recipe::create([
           'user_id' => Auth::user()->id,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' =>$request->description
//        'image' =>
       ]);
       return redirect('/recipe');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Recipe $recipes
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
      //
    }

    public function show(){
        return view('recipe');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *  @param \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
