<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'telephone', 'password',
    ];


    public static $rules = array(
        'firstname'=>'required|min:2|alpha',
        'lastname'=>'min:2|alpha',
        'email'=>'required|email|unique:users',
        'password'=>'required|alpha_num|min:6|confirmed',
        'password_confirmation'=>'required|alpha_num|min:6',
        'telephone'=>'between:10,12',
        'admin'=>'integer'
    );

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function IsAdmin()
    {
        return $this->admin===1;
    }
}
