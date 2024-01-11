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
            $table->foreignId('produtos_id')->constrained('produtos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vendas_id')->constrained('vendas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vendas_produtos');
    }
}
