<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
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
}
