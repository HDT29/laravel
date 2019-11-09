<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birthday' => $faker->date(),
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'password' =>bcrypt('12345'),
        'role' =>$faker->randomElement(['admin','user'])
    ];
});
