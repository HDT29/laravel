<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
	$posts_id = Post::pluck('id')->toArray();
	$users_id = User::pluck('id')->toArray();
    return [
        'content' => $faker->text(),
        'post_id' => $faker->randomElement($posts_id),
        'user_id' => $faker->randomElement($users_id),
    ];
});
