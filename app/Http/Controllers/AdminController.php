<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;
use App\recipe;

class AdminController extends Controller
{
    //function to show the adminpage. Only visible if you are an admin. If you try to get in as a user, you will be redirected.
    public function index(){
        if (auth()->user()->is_admin == 1) {
                $recipes = Recipe::All();
                return view('admin', compact('recipes'));
            }else{
            return view('welcome');
        }
    }
}
