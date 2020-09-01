<?php

namespace App;

use App\Email;
use DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Email extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'username',
    ];

    public static function create(array $data) {
        DB::insert('insert into email (email, username) values (?, ?)', array($data['email'], $data['username']));
    }
}