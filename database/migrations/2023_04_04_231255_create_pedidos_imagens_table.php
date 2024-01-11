<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosImagensTable extends Migration
{
    public function up()
    {
        Schema::create('pedidos_imagens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imagem', 150);

            $table->unsignedBigInteger('pedidos_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('pedidos_imagens', function($table) {
            $table->foreign('pedidos_id')->references('id')->on('pedidos')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos_imagens');
    }
}
