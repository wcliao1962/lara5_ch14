<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
        'type' => 0,
		'provider' => null,
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker){
	return [
		'title' => $faker->sentence(mt_rand(3, 10)),
		'content' => $faker->paragraphs(mt_rand(3, 6),true),
		'user_id' => 0,
		'created_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
	];
});

$factory->define(App\PostType::class, function (Faker\Generator $faker){
	return [
		'name' => $faker->words(mt_rand(1, 3),true)
	];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker){
	return [
		'post_id' => 0,
		'user_id' => 0,
		'content' => $faker->sentence(mt_rand(3, 10)),
		'created_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
	];
});