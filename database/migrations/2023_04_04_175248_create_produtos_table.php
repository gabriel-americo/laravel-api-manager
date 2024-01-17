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
            $table->foreignId('tipo_produto_id')->constrained('tipo_produtos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cor_camiseta_id')->constrained('cor_camisetas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
