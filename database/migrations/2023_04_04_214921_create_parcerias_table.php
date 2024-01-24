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
            $table->foreignId('tipo_parceria_id')->constrained('tipos_parcerias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parcerias');
    }
}
