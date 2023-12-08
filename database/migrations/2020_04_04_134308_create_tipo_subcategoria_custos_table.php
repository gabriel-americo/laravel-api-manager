<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoSubcategoriaCustosTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_subcategoria_custos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subcategoria', 80);

            $table->unsignedBigInteger('tipo_custos_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('tipo_subcategoria_custos', function($table) {
            $table->foreign('tipo_custos_id')->references('id')->on('tipo_custos')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_subcategoria_custos');
    }
}
