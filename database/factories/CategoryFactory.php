<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
	$user_id = User::pluck('id')->toArray();
    return [
    	'user_id' =>$faker->randomElement($user_id),
        'name' => $faker->name,
        
    ];
});
