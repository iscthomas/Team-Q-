<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name', 'category', 'description', 'image'
    ];
    // public function getImageAttribute()
    // {
    //     return $this->image;
    // }
}
