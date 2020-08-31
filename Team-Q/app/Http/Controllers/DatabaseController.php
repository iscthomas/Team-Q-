<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function showHighscores($highscore)
    {   
        // hardcoded data test
        $data = [
            'leaderboard' => '',
            'test' => ''
        ];

        // dd($highscore);

        // highscores is the name of the view page
        return view('highscores', [
            //making a variable called highscore 
            //that takes test scores inside the data obj
            'highscore' => $data[$highscore]
        ]);
    }
}
