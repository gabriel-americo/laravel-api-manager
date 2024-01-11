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
            $table->foreignId('ideias_id')->constrained('ideias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('usuarios_id')->constrained('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perguntas_ideias');
    }
}
