<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;

class HomeController extends Controller
{
    //intiates the auth middelware. (making auth available everywhere in this file)
    public function __construct()
    {
        $this->middleware('auth');
    }


    //index function. Shows the homescreen page for the user. Only visible by the current user.
    public function index()
    {
        if (auth()->user()->is_admin == 0) {
            $user = user::where('id', Auth::user()->id)->first();

            $userCreatedAt = $user->created_at;
            $datediv = now()->diffInDays($userCreatedAt);

            return view('home', compact('user', 'datediv'));
        } else {
            return view('welcome');
        }
    }

    //function to get to the edit your name and email page.
    public function edit(User $user)
    {
            if (auth()->user()->is_admin == 0) {
                return view('home', compact('user'));
            }
            else{
                return view('welcome');
            }
    }


    //function to validate and update/edit the input name and email which the user gave.
    public function update(User $user,Request $request, $id)
    {
            if (auth()->user()->is_admin == 0) {
                $request->validate([
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:1000'
                ]);

                $user = User::findOrFail($id);
                $user->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                ]);
                return redirect('home')->with('success', 'gegevens zijn aangepast');
            }
            else{
                return view('welcome');
            }
    }



}

