<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;
use App\recipe;

class AdminController extends Controller
{
//    public function show()
//    {
//        return view('admin');
//    }

    public function index(){
        $recipes = Recipe::All();
        return view('admin', compact('recipes'));
    }
}
