<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});