<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlteracaoTable extends Migration
{
    public function up()
    {
        Schema::create('alteracao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('correcao');
            $table->boolean('status');

            $table->unsignedBigInteger('aprovacao_id');
            $table->unsignedBigInteger('usuarios_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('alteracao', function($table) {
            $table->foreign('aprovacao_id')->references('id')->on('aprovacao')
                ->onDelete('cascade')->onUpdade('cascade');
            $table->foreign('usuarios_id')->references('id')->on('usuarios')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('alteracao');
    }
}
