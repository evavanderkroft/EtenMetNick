<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = user::where('id', Auth::user()->id)->first();

        return view('home', compact('user')); dd($user);
    }

    public function edit(User $user)
    {
        return view('home', compact('user'));
    }

    public function store(Request $request)
    {
        User::create([
            'id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' =>$request->password
        ]);
        return redirect('/home', compact('user'));
    }

    public function update(User $user, Request $request)
    {
//        dd($request);

        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|max:1000',
            'password'=>'required|max:255',
        ]);

        $user->update(request(['name', 'email', 'password']));
        return redirect('/home')->with('succes!', 'gegevens zijn aangepast');
    }

    public function admin(User $user)

    {
        $user = User::with('recipes')->get();
        // dd($users);

        return view('admin', compact('user'));
    }

}

