<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlteracoesTable extends Migration
{
    public function up()
    {
        Schema::create('alteracoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('correcao');
            $table->boolean('status');
            $table->foreignId('aprovacao_id')->constrained('aprovacoes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alteracao');
    }
}
