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

Route::resource('/recipe','RecipeController');
//Route::get('recipe', 'RecipeController@show') ->name('recipe');
Route::get('newAccount', "newAccountController@show") ->name('newAccount');
Route::get('Login', "loginController@show") ->name('login');

//Route::get('/delete/{recipe_id}',
//    ['uses' =>'RecipeController@destroy',
//    'as' => 'recipe.delete',
//        'middelware' => 'auth'
//]);



Auth::routes();
Route::resource('/home', 'HomeController');
Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
//Route::get('home', 'HomeController@edit')->name('homeEdit');
