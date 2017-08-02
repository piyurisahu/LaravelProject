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
        return view('users.index');
        die("xusfsd");

    }}
