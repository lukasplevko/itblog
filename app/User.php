<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Laravelista\Comments\Commenter;
use App\Notifications\VerifyEmail;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Commenter;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

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

    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function curriculums(){
        return $this->hasMany('App\Curriculum');
    }

    public function sendEmailVerificationNotification()
    {
    $this->notify(new VerifyEmail); // my notification
}


}

