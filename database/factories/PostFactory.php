<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=> Str::random(10),
        'body' => Str::random(100),
        'user_name'=> 'plebo',
        'created_at' =>  now(),
        'updated_at' => now(),
        'cover_image' => 'laravel.png',
        'user_id' => 1,
        'category' => 'Article',
        'theme' => 'laravel',
        'slug' => Str::slug(Str::random(10))
    ];
});
