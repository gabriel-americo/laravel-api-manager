<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 50);
            $table->string('imagem', 150)->nullable();
            $table->date('data')->nullable();
            $table->boolean('status');

            $table->unsignedBigInteger('tipo_produtos_id');
            $table->unsignedBigInteger('cor_camisetas_id');
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('produtos', function($table) {
            $table->foreign('tipo_produtos_id')->references('id')->on('tipo_produtos')
                ->onDelete('cascade')->onUpdade('cascade');
            $table->foreign('cor_camisetas_id')->references('id')->on('cor_camisetas')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
