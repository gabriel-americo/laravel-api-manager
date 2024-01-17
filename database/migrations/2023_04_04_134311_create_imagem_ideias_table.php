<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagemIdeiasTable extends Migration
{
    public function up()
    {
        Schema::create('imagem_ideias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('legenda', 150)->nullable();
            $table->string('imagem', 150);
            $table->unsignedBigInteger('ideias_id');
            $table->foreignId('ideia_id')->constrained('ideias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagem_ideias');
    }
}
