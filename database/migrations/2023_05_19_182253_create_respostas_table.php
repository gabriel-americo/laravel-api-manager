<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespostasTable extends Migration
{

    public function up()
    {
        Schema::create('resposta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('resposta');
            $table->date('data')->nullable();
            $table->foreignId('alteracao_id')->constrained('alteracoes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resposta');
    }
}
