<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParceriasProdutosTable extends Migration
{
    public function up()
    {
        Schema::create('parcerias_produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tamanho', 150);
            $table->string('qtd', 50);
            $table->foreignId('produtos_id')->constrained('produtos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('parcerias_id')->constrained('parcerias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parcerias_produtos');
    }
}
