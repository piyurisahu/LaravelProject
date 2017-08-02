<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //

    public function index()
    {

        // select * =from User
        $users=User::all();

        //$users=User::where('age','>=',21);
        //return $users;
        return view('users.index',compact('users'));
        die("xusfsd");

    }

    public function  store()
    {
        $user=new User;
        $user->name=request('name');
        $user->email=request('email');
        $user->password=bcrypt(request('password'));
        $user->save();
        return back();

    }
}
