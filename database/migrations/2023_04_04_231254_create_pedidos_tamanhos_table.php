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
            $table->foreignId('pedido_id')->constrained('pedidos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos_tamanhos');
    }
}
