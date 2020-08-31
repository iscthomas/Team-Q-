<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
        /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'group_names';
    
    protected $fillable = [
        'group_name', 'description', 'image'
    ];
    // public function getImageAttribute()
    // {
    //     return $this->image;
    // }
}
