<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorEstampasProdutosTable extends Migration
{
    public function up()
    {
        Schema::create('cor_estampa_produto', function (Blueprint $table) {
            $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cor_estampa_id')->constrained('cor_estampas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cor_estampa_produto');
    }
}
