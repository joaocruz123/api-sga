<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Nomeacao;
use Faker\Generator as Faker;

$factory->define(Nomeacao::class, function (Faker $faker) {

    return [
        'membro_id' => $faker->randomDigitNotNull,
        'cargo_id' => $faker->randomDigitNotNull,
        'inicio_mandato' => $faker->word,
        'termino_mandato' => $faker->word,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
