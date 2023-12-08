<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 200);
            $table->date('data_solicitacao')->nullable();
            $table->date('data_entrega')->nullable();
            $table->date('data_pagamento')->nullable();
            $table->string('cor_camiseta', 200);
            $table->string('tamanho_arte', 200);
            $table->string('tipo_estampa', 200);
            $table->string('quantidade_cores', 200)->nullable();
            $table->string('quantidade_telas', 200);
            $table->string('quantidade_silk', 200);
            $table->string('precisa_base', 200);
            $table->float('preco');
            $table->longText('observacao');
            $table->boolean('status');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
