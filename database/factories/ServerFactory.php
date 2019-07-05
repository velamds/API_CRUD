<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Server;
use Faker\Generator as Faker;

$factory->define(Server::class, function (Faker $faker) {
    return [
        'name'  => $faker->text(12),
        'specs' => $faker->text(48)
    ];
});
