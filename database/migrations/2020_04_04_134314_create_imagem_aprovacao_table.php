<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagemAprovacaoTable extends Migration
{
    public function up()
    {
        Schema::create('imagem_aprovacao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('legenda', 80)->nullable();
            $table->string('imagem', 150);

            $table->unsignedBigInteger('aprovacao_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('imagem_aprovacao', function($table) {
            $table->foreign('aprovacao_id')->references('id')->on('aprovacao')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagem_aprovacao');
    }
}
