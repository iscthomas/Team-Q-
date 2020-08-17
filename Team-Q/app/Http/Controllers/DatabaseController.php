<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function showHighscores($highscore)
    {   
        // hardcoded data test
        $data = [
            'test' => 'this is the first test highscore: 80%',
            'test2' => 'this is the second test highscore: 89%'
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
