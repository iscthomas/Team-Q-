<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
            /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'games';

    protected $fillable = [
        'name', 'category', 'description', 'image'
    ];
    // public function getImageAttribute()
    // {
    //     return $this->image;
    // }
}
