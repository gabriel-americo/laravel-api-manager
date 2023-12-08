<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorEstampasTable extends Migration
{
    public function up()
    {
        Schema::create('cor_estampas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cor', 50);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cor_estampas');
    }
}
