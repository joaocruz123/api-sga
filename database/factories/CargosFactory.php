<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cargos;
use Faker\Generator as Faker;

$factory->define(Cargos::class, function (Faker $faker) {

    return [
        'nome' => $faker->word,
        'descricao' => $faker->word,
        'ativo' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
