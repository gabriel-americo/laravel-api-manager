<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resposta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('resposta');
            $table->date('data')->nullable();

            $table->unsignedBigInteger('alteracao_id');
            $table->unsignedBigInteger('usuarios_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('resposta', function($table) {
            $table->foreign('alteracao_id')->references('id')->on('alteracao')
                ->onDelete('cascade')->onUpdade('cascade');
            $table->foreign('usuarios_id')->references('id')->on('usuarios')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resposta');
    }
}
