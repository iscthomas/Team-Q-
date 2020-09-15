<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Highscore extends Model
{
        /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'group_highscores';
    
    protected $fillable = [
        'joined_group_id', 'user_id', 'highscore',
    ];
}
