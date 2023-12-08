<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParceriasTable extends Migration
{
    public function up()
    {
        Schema::create('parcerias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 80);
            $table->float('valor');
            $table->longText('descricao');
            $table->date('data')->nullable();
            $table->boolean('status');

            $table->unsignedBigInteger('tipo_parcerias_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('parcerias', function($table) {
            $table->foreign('tipo_parcerias_id')->references('id')->on('tipo_parcerias')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('parcerias');
    }
}
