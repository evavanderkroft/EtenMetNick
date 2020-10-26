<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('recipe/category', 'RecipeController@category')->name('recipe.category');
Route::get('recipe/search', 'recipeController@search')->name('recipe.search');
Route::resource('/recipe','RecipeController');
//    ->only( ['index', 'edit','update', 'destroy', 'create', 'show' ]);

//Route::POST('/recipe', 'RecipeController@category')->name('recipe.category');
//Route::POST('/recipe', 'RecipeController@store')->name('recipe.store');
//Route::get('recipe', 'RecipeController@show') ->name('recipe');
Route::get('newAccount', "newAccountController@show") ->name('newAccount');
Route::get('Login', "loginController@show") ->name('login');

//Route::get('/delete/{recipe_id}',
//    ['uses' =>'RecipeController@destroy',
//    'as' => 'recipe.delete',
//        'middelware' => 'auth'
//]);



Auth::routes();
//Route::resource('/home', 'HomeController');
Route::resource('/home', 'HomeController', ['only' => ['index', 'edit','update']]);
Route::resource('/admin', 'AdminController');
//Route::put('/home', 'HomeController@update')->name('home.update');
//Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
//Route::get('home', 'HomeController@edit')->name('homeEdit');
