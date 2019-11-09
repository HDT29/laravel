<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
	$category_id = Category::pluck('id')->toArray();
	$user_id = User::pluck('id')->toArray();
    return [
    		'title' => $faker->text(11),
    		'content' => $faker->text(255),
    		'category_id' => $faker->randomElement($category_id),
    		'user_id' => $faker->randomElement($user_id),
    ];
});
