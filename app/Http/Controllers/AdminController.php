<?php

namespace App\Http\Controllers;
use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }
    public  function showUser(){
         $users = User::all();
         return view('admin.show')->with('users',$users);
    }

    public  function showAvatar(Request $request){

        if ($request->hasFile('image')){
            $avatar = $request->file('image');
            $filename = time(). '.' . $avatar->getClientOriginalExtension();

            $path = $request->file('image')->move
            (base_path().'/public/avatars/',$filename);

            //Image::make($avatar)->resize(300,300)->save(base_path().'/avatars/'.$filename);

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

        }

        return redirect()->route('admin.dashboard');





    }


}
