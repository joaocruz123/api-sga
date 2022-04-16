<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomeacoesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomeacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('membro_id')->unsigned();
            $table->integer('cargo_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('membro_id')->references('id')->on('membros');
            $table->foreign('cargo_id')->references('id')->on('cargos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nomeacoes');
    }
}
