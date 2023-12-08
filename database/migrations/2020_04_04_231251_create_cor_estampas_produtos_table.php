<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorEstampasProdutosTable extends Migration
{
    public function up()
    {
        Schema::create('cor_estampas_produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('produtos_id');
            $table->unsignedBigInteger('cor_estampas_id');
        });

        Schema::table('cor_estampas_produtos', function($table) {
            $table->foreign('produtos_id')->references('id')->on('produtos')
                ->onDelete('cascade')->onUpdade('cascade');
            $table->foreign('cor_estampas_id')->references('id')->on('cor_estampas')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cor_estampas_produtos');
    }
}
