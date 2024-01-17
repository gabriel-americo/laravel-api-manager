<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuantidadesTable extends Migration
{
    public function up()
    {
        Schema::create('quantidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('qtd_feita');
            $table->integer('qtd_estoque');
            $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tamanho_id')->constrained('tamanhos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quantidades');
    }
}
