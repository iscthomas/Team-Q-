<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
        /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'groups';
    
    protected $fillable = [
        'user_highscore', 'user_id', 'group_id'
    ];
}
