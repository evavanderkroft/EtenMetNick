<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use Auth;

class RecipeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
//    public function index(){
//        return
//    }

    public function index(Recipe $recipe)
    {
        $recipes = Recipe::Where('is_available', 1)->get();

//        'title', 'like', '%' . $request->search . '%'
//        dd($recipes);
//     $search = Recipe::get('title');
//     $recipes=Recipe::search()->orderBy('name')->paginate(20);

//     $recipeSearch = Recipe::where('title', 'like', '%'.$search.'%')
//         ->orderBy('recipe')
//         ->paginate(20);
        return view('recipes.index', compact('recipes'));

//        $recipes = Recipe::table('recipes')->get();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('recipes.create');
        } else {
            return view('recipes.index');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->is_available) {
        $isAvailable = 0;
    } else {
        $isAvailable = 1;
    }
        if (!$request->is_saved) {
            $isSaved = 0;
        } else {
            $isSaved = 1;
        }

        Recipe::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'category' => $request->category,
            'is_available' => $isAvailable,
            'is_saved'=> $isSaved
//        'image' =>
        ]);
//        dd($request->category);
        return redirect('/recipe');


    }

    /**ph
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

    public function show($id)
    {
        $recipe = Recipe::find($id);
        return view('/recipes.show', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,
                           Recipe $recipe
//                           ,$id
    )
    {
//        dd($request);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'short_description' => 'required|max:255',
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
        $recipe = Recipe::find($id);
        $recipe->delete();
        return redirect('/recipe');
    }

    public function category(Recipe $recipe, Request $request)
    {
//dd($request);
        $recipes = Recipe::where('category', $request->category)
            ->where('is_available', 1)
            ->get();
//dd($recipes);
        return view('recipes.index', compact('recipes'));
    }

    public function search(Recipe $recipe, Request $request)
    {
        $search = $request->get('search');

        $recipes = Recipe::where('title', 'like', '%' . $request->search . '%')->orWhere('short_description', 'like', '%' . $request->search . '%')
            ->where('is_available', 1)
            ->get();
//        dd($request->search);
        return view('recipes.index', compact('recipes'));
    }

    public function available(Recipe $recipe, Request $request, $id)
    {
//        dd($id);
//        dd($request->all());
        $Available = $request->input('is_available');
        $recipe = Recipe::find($id);

        if (isset($Available)) {
            // Feature recipe
            $recipe->is_available = 1;
            $recipe->save();

            return redirect('/admin')->with('success', 'This recipe is now featured');
        } else {
            // Unfeature recipe
            $recipe->is_available = 0;
            $recipe->save();

            return redirect('/admin')->with('warning', 'This recipe is not featured anymore');
        }
    }

//    public function Switchsaved(Recipe $recipe, Request $request, $id)
//    {
//        $Saved = $request->input('is_saved');
//        $recipe = Recipe::find($id);
//
//        if (isset($Saved)) {
//            // Feature recipe
//            $recipe->is_saved = 1;
//            $recipe->save();
//
//            return redirect('/index')->with('success', 'This recipe is now saved');
//        } else {
//            // Unfeature recipe
//            $recipe->is_saved = 0;
//            $recipe->save();
//
//            return redirect('/index')->with('warning', 'This recipe is not saved anymore');
//        }
////        return view('recipes.saved');
//    }
}

