<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;


class Post extends Model
{
    use Commentable;

    // Table name
    protected $table = 'posts';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;


    public function user(){
        return $this->belongsTo('App\User');
    }





}
