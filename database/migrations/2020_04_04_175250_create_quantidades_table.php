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

            $table->unsignedBigInteger('produtos_id');
            $table->unsignedBigInteger('tamanhos_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('quantidades', function($table) {
            $table->foreign('produtos_id')->references('id')->on('produtos')
                ->onDelete('cascade')->onUpdade('cascade');
            $table->foreign('tamanhos_id')->references('id')->on('tamanhos')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quantidades');
    }
}
