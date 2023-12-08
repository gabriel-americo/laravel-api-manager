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

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('imagem_ideias', function($table) {
            $table->foreign('ideias_id')->references('id')->on('ideias')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagem_ideias');
    }
}
