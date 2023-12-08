<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorCamisetasTable extends Migration
{
    public function up()
    {
        Schema::create('cor_camisetas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cor', 80);
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cor_camisetas');
    }
}
