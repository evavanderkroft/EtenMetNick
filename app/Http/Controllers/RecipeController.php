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
//     $search = Recipe::get('title');
//     $recipes=Recipe::search()->orderBy('name')->paginate(20);

//     $recipeSearch = Recipe::where('title', 'like', '%'.$search.'%')
//         ->orderBy('recipe')
//         ->paginate(20);
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
            'description' =>$request->description,
           'category' =>$request->category,
//        'image' =>
       ]);
//        dd($request->category);
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
        return view('recipes.edit', compact('recipe'));
    }

    public function show($id){
        $recipe = Recipe::find($id);
        return view('/recipes.show', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *  @param \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,
                            Recipe $recipe
//                           ,$id
    )
    {
//        dd($request);

        $request->validate([
            'title'=>'required|max:255',
            'description'=>'required|max:1000',
            'short_description'=>'required|max:255',
        ]);

//        $recipe = Recipe::find($id);
//        $recipe->update([
//            'title' => $request->input('title'),
//            'description' => $request->input('description'),
//            'short_description' => $request->input('short_description')
//        ]);
//        dd("hoi");

//        $recipe=Recipe::find($id);
//        $recipe->title = $request->get('title');
//        $recipe->short_description = $request->get('short_description');
//        $recipe->description = $request->get('description');
//        $recipe->img = $request->get('img');
//        $recipe->save();

        $recipe->update(request(['title', 'description', 'short_description', 'category']));
        return redirect('/recipe')->with('succes!', 'recept is aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe=Recipe::find($id);
        $recipe->delete();
        return redirect('/recipe');
    }

    public function category(Recipe $recipe, Request $request){
//dd($request);
$recipes =Recipe::where('category', $request->category )->get();
//dd($recipes);
return view('recipes.index', compact('recipes'));
    }

    public function search(Recipe $recipe, Request $request){
$search = $request->get('search');

$recipes=Recipe::where('title', 'like', '%'.$request->search.'%')->get();
//        dd($request->search);
return view('recipes.index', compact('recipes'));
}
//
//    public function search($q){
////$search = $request->get('search');
////        dd($request);
//        return empty(request()->search) ? $q :$q->where('title', 'like', '%'.request()->search.'%');
////        $recipes=Recipe::where('name', 'like', '%', $request->get('search'), '%');
////        return view('recipes.index', compact('recipes'));
//    }
}

