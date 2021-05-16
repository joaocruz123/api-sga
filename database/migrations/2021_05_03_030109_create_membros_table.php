<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros', function (Blueprint $table) {
            $table->id();

            //Pessoal
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('cpf')->unique();
            $table->string('sexo')->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('data_nascimento')->nullable();
            $table->string('estado_civil')->nullable();

            //Endereço
            $table->string('cep')->nullable();
            $table->string('endereco')->nullable();
            $table->string('bairro')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();

            //Proficional
            $table->string('profissao')->nullable();
            $table->string('endereco_trabalho')->nullable();
            
            //Atuação
            $table->string('cargo')->nullable();
            $table->string('data_conversao')->nullable();
            $table->string('batizado')->nullable();
            $table->string('afastado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membros');
    }
}
