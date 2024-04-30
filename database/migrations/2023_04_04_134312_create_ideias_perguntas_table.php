<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeiasPerguntasTable extends Migration
{
    public function up()
    {
        Schema::create('ideias_perguntas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('pergunta');
            $table->longText('resposta')->nullable();
            $table->foreignId('ideia_id')->constrained('ideias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ideias_perguntas');
    }
}
