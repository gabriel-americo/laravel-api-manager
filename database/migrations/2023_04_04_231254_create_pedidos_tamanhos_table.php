<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTamanhosTable extends Migration
{
    public function up()
    {
        Schema::create('pedidos_tamanhos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 200);
            $table->integer('p')->nullable();
            $table->integer('m')->nullable();
            $table->integer('g')->nullable();
            $table->integer('gg')->nullable();
            $table->integer('xg')->nullable();

            $table->unsignedBigInteger('pedidos_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('pedidos_tamanhos', function($table) {
            $table->foreign('pedidos_id')->references('id')->on('pedidos')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos_tamanhos');
    }
}
