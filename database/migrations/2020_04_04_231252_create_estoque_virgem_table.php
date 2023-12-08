<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstoqueVirgemTable extends Migration
{
    public function up()
    {
        Schema::create('estoque_virgem', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('qtd');

            $table->unsignedBigInteger('tamanhos_id');
            $table->unsignedBigInteger('tipo_produtos_id');
            $table->unsignedBigInteger('cor_camisetas_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('estoque_virgem', function($table) {
            $table->foreign('tamanhos_id')->references('id')->on('tamanhos')
                ->onDelete('cascade')->onUpdade('cascade');
            $table->foreign('tipo_produtos_id')->references('id')->on('tipo_produtos')
                ->onDelete('cascade')->onUpdade('cascade');
            $table->foreign('cor_camisetas_id')->references('id')->on('cor_camisetas')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('estoque_virgem');
    }
}
