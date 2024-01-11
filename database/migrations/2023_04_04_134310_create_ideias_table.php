<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeiasTable extends Migration
{
    public function up()
    {
        Schema::create('ideias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 80);
            $table->longText('descricao')->nullable();
            $table->date('data_inicio')->nullable();
            $table->date('data_entrega')->nullable();
            $table->date('data_lancamento')->nullable();
            $table->string('criador', 80);
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ideias');
    }
}
