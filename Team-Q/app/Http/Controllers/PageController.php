<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function home()
    {
        return view('home');
    }

    public function games()
    {
        return view('games');
    }

    public function groups()
    {
        return view('groups');
    }

    public function scores()
    {
        return view('scores');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }
}
