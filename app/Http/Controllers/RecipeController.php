<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\User;
use Auth;

class RecipeController extends Controller
{
//intiates the auth middelware. (making auth available everywhere)
    public function __construct()
    {
        $this->middleware('auth');
    }

    //index function. Shows the indexpage of the recipes.
    public function index(Recipe $recipe)
    {
        $recipes = Recipe::Where('is_available', 1)
            ->withLikes()
            ->get();

        $user = Auth::user();


        $user2 = User::where('id', $user->id)->first();
       $userCreatedAt = $user2->created_at;
       $datediv = now()->diffInDays($userCreatedAt);

       if($datediv>=5)
       {
           $ShowLike = true;
       }
       else
           {
           $ShowLike= false;
           }

        return view('recipes.index', compact('recipes','user', 'ShowLike'));

    }


    //check if you, as a user, are logged in. If you are, you will go on to recipes.create, if not you will return to the index.
    public function create()
    {

            return view('recipes.create');
    }

    //function to store the information given by the admin to make a recipe. Without validation there won't be anything saved.
    public function store(Request $request)
    {
        //if the recipe is not available, the $isAvailable variable is 0, if it is available, it is 1.
        if (!$request->is_available) {
        $isAvailable = 0;
    } else {
        $isAvailable = 1;
    }
        //the inputfields will be validated. If not filled in correctly, it will show an error.
        $request->validate([
            'title' => 'required|max:255',
            'short_description' => 'required|max:255',
            'description' => 'required|max:1000',
            'category'=>'required'
        ]);

    //the requests to create the recipe items for the database. This will create a new recipe.
      $recipe =  Recipe::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'category' => $request->category,
            'is_available' => $isAvailable

        ]);

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
    //function to edit. This will send the admin to the recipes.edit page.
    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    //function to show only one recipe in detail. This will send the user to the recipes.show page.
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

    //edit/update function. Will make the admin able to edit the recipes by title, short and normal description and by category.
    public function update(Request $request, Recipe $recipe)
    {
        //validate if the title, description and short description are filled in. if not, it shows an error.
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'short_description' => 'required|max:255',
            'category'=>'required'
        ]);

        //updates the request send by the admin. If done correctly without errors, it will update the data in database and redirect.
        $recipe->update(request(['title', 'description', 'short_description', 'category']));
        return redirect('/recipe')->with('succes!', 'recept is aangepast');
    }

    //function to destroy the recipe. This is only able by the admin.
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return redirect('/recipe');
    }


//    function for categories. The user can now choose between categories of types of food.
    public function category(Recipe $recipe, Request $request)
    {
        //made sure that the like and dislike buttons are able to operate.
        $user = Auth::user();
        $user2 = User::where('id', $user->id)->first();
        $userCreatedAt = $user2->created_at;
        $datediv = now()->diffInDays($userCreatedAt);

        if($datediv>=5)
        {
            $ShowLike = true;
        }
        else
        {
            $ShowLike= false;
        }
        //show the recipes where the request is the same as the category in the dropdown.

        if ($request->category =="Geen categorie"){
            $recipes =Recipe::where('is_available', 1)->get();
        } else{
            $recipes = Recipe::where('category', $request->category)
                ->where('is_available', 1)
                ->get();
        }
        return view('recipes.index', compact('recipes', 'ShowLike'));
    }


    //Search function. This makes it able to search in the recipes. This can be done in title as well as in short Description.
    public function search(Recipe $recipe, Request $request)
    {
        //made sure that the like and dislike buttons are able to operate.
        $user = Auth::user();
        $user2 = User::where('id', $user->id)->first();
        $userCreatedAt = $user2->created_at;
        $datediv = now()->diffInDays($userCreatedAt);

        if($datediv>=5)
        {
            $ShowLike = true;
        }
        else
        {
            $ShowLike= false;
        }
        $search = $request->get('search');

        //make sure that the letter typed is "like" the title or the short description, but only from the ones available.
        $recipes = Recipe::where('title', 'like', '%' . $request->search . '%')->orWhere('short_description', 'like', '%' . $request->search . '%')
            ->where('is_available', 1)
            ->get();
//        dd($request->search);
        return view('recipes.index', compact('recipes', 'ShowLike'));
    }


    //function to make the recipe available for the users. This can only be done by the admin in adminscreen.
    public function available(Recipe $recipe, Request $request, $id)
    {
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
//function to store the like. This will be used to remember if the user has liked the recipe or not.
    public function storeLike(Recipe $recipe){
        $recipe->like(auth()->user());

        return back();
    }

    //function to destroy the like. This will be used to destroy the like and make sure it will be disliked.
    public function destroyLike(Recipe $recipe){
        $recipe->dislike(auth()->user());

        return back();
    }
}

