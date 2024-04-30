<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprovacoesImagensTable extends Migration
{
    public function up()
    {
        Schema::create('aprovacoes_imagens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('legenda', 80)->nullable();
            $table->string('imagem', 150);
            $table->foreignId('aprovacao_id')->constrained('aprovacoes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aprovacoes_imagens');
    }
}
