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

            $table->unsignedBigInteger('tipo_vendas_id');
            $table->unsignedBigInteger('tipo_pagamentos_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('vendas', function($table) {
            $table->foreign('tipo_vendas_id')->references('id')->on('tipo_vendas')
                ->onDelete('cascade')->onUpdade('cascade');
            $table->foreign('tipo_pagamentos_id')->references('id')->on('tipo_pagamentos')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
