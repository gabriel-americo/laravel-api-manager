<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerguntasIdeiasTable extends Migration
{
    public function up()
    {
        Schema::create('perguntas_ideias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('perguntas');
            $table->longText('respostas')->nullable();

            $table->unsignedBigInteger('ideias_id');
            $table->unsignedBigInteger('usuarios_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('perguntas_ideias', function($table) {
            $table->foreign('ideias_id')->references('id')->on('ideias')
                ->onDelete('cascade')->onUpdade('cascade');
            $table->foreign('usuarios_id')->references('id')->on('usuarios')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('perguntas_ideias');
    }
}
