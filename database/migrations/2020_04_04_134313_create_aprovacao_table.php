<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprovacaoTable extends Migration
{
    public function up()
    {
        Schema::create('aprovacao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('descricao', 80)->nullable();
            $table->boolean('status');

            $table->unsignedBigInteger('ideias_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('aprovacao', function($table) {
            $table->foreign('ideias_id')->references('id')->on('ideias')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('aprovacao');
    }
}
