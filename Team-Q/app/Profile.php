<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'avatar', 'real_name', 'favourite_games', 'location', 'about_me'
    ];
}