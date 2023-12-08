<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasProdutosTable extends Migration
{
    public function up()
    {
        Schema::create('vendas_produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tamanho', 150);
            $table->integer('qtd');
            $table->float('valor');
            $table->string('desconto');

            $table->unsignedBigInteger('produtos_id');
            $table->unsignedBigInteger('vendas_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('vendas_produtos', function($table) {
            $table->foreign('produtos_id')->references('id')->on('produtos')
                ->onDelete('cascade')->onUpdade('cascade');
            $table->foreign('vendas_id')->references('id')->on('vendas')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vendas_produtos');
    }
}
