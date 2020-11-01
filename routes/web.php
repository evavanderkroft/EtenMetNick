<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route to the welcome page.
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
//route to store like function.
Route::post('/recipes/{recipe}/like', 'RecipeController@storeLike')->middleware('auth');
//route to delete like function.
Route::delete('/recipes/{recipe}/like', 'RecipeController@destroyLike')->middleware('auth');
//route to find categories in recipes.
Route::post('recipe/category', 'RecipeController@category')->name('recipe.category')->middleware('auth');
//route to find recipes by letter.
Route::get('recipe/search', 'recipeController@search')->name('recipe.search')->middleware('auth');
//route to toggle the availability of the recipe.
Route::post('recipe/available/{id}', 'RecipeController@available')->name('recipe.available')->middleware('auth');
//route to everything further related to the recipe (index, edit, create, update, destroy, show).
Route::resource('/recipe','RecipeController');

//route to everything that has to do with authentication.
Auth::routes();
//route to the edit data from the user. Only using the index, edit and update function.
Route::resource('/home', 'HomeController', ['only' => ['index', 'edit','update']])->middleware('auth');
//Route to the admin page. Only available for the admin when logged in.
Route::resource('/admin', 'AdminController')->middleware('auth');

