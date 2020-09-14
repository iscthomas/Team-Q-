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
        'group_id', 'user_id'
    ];
}