<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeiasImagensTable extends Migration
{
    public function up()
    {
        Schema::create('ideias_imagens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('legenda', 150)->nullable();
            $table->string('imagem', 150);
            $table->foreignId('ideia_id')->constrained('ideias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ideias_imagens');
    }
}
