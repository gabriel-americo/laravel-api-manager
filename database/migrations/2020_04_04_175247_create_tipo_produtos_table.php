<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoProdutosTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo', 80);
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_produtos');
    }
}
