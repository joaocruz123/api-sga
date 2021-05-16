<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Membros;
use Faker\Generator as Faker;

$factory->define(Membros::class, function (Faker $faker) {

    return [
        'nome' => $faker->word,
        'email' => $faker->word,
        'cpf' => $faker->word,
        'sexo' => $faker->word,
        'telefone' => $faker->word,
        'celular' => $faker->word,
        'data_nascimento' => $faker->word,
        'estado_civil' => $faker->word,
        'cep' => $faker->word,
        'endereco' => $faker->word,
        'bairro' => $faker->word,
        'numero' => $faker->word,
        'complemento' => $faker->word,
        'cidade' => $faker->word,
        'estado' => $faker->word,
        'profissao' => $faker->word,
        'endereco_trabalho' => $faker->word,
        'atuacao' => $faker->word,
        'data_conversao' => $faker->word,
        'batizado' => $faker->word,
        'afastado' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
