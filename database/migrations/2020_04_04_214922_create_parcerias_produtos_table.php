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

            $table->unsignedBigInteger('produtos_id');
            $table->unsignedBigInteger('parcerias_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('parcerias_produtos', function($table) {
            $table->foreign('produtos_id')->references('id')->on('produtos')
                ->onDelete('cascade')->onUpdade('cascade');
            $table->foreign('parcerias_id')->references('id')->on('parcerias')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('parcerias_produtos');
    }
}
