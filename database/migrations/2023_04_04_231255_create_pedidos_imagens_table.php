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
            $table->foreignId('pedido_id')->constrained('pedidos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos_imagens');
    }
}
