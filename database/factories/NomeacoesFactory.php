<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Nomeacoes;
use Faker\Generator as Faker;

$factory->define(Nomeacoes::class, function (Faker $faker) {

    return [
        'membro_id' => $faker->randomDigitNotNull,
        'cargo_id' => $faker->randomDigitNotNull,
        'inicio_mandato' => $faker->word,
        'termino_mandato' => $faker->work,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
