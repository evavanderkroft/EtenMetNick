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

        $userCreatedAt = $user->created_at;
        $datediv = now()->diffInDays($userCreatedAt);

        return view('home', compact('user', 'datediv'));
    }

    public function edit(User $user)
    {
        return view('home', compact('user'));
    }

//    public function store(Request $request)
//    {
//        User::create([
////            'id' => Auth::user()->id,
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' =>$request->password
//        ]);
////        dd($request);
//        return redirect('home');
//    }

    public function update(User $user,Request $request, $id)
    {
//        dd($id);

//        $this->validate($request, [
//            'total_paid' => 'required|numeric',
//        ]);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:1000'
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

//        return redirect()
//            ->route('/home');

//        $request->validate([
//            'name'=>'required|max:255',
//            'email'=>'required|max:1000',
//            'password'=>'required|max:255',
//        ]);
//        $user = user::where('id', Auth::user()->id)->first();
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->password = $request->password;
//        $user->save();
//
////        $user->update(request(['name', 'email', 'password']));
        return redirect('home')->with('success', 'gegevens zijn aangepast');
    }

//    public function admin(User $user)
//
//    {
//        $user = User::with('recipes')->get();
//        // dd($users);
//
//        return view('admin', compact('user'));
//    }


}

