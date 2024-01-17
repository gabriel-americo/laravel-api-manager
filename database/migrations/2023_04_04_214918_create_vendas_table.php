<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comprador', 150);
            $table->float('valor_total');
            $table->float('frete');
            $table->longText('descricao')->nullable();
            $table->date('data')->nullable();
            $table->boolean('status');
            $table->foreignId('tipo_venda_id')->constrained('tipo_vendas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tipo_pagamento_id')->constrained('tipo_pagamentos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
