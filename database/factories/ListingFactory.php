<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Listing;
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

$factory->define(Listing::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->text,
        'company_email' => $faker->unique()->safeEmail,
        'contact_email' => $faker->unique()->safeEmail,
        'street_address' => $faker->streetAddress,
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'state_id' => 52,
        'phone' => $faker->phoneNumber,
        'website' => $faker->safeEmailDomain,
        'is_approved' => 1
    ];
});
