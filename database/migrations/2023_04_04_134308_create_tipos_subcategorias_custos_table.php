<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposSubcategoriasCustosTable extends Migration
{
    public function up()
    {
        Schema::create('tipos_subcategorias_custos', function (Blueprint $table) {
            $table->id();
            $table->string('subcategoria', 80);
            $table->foreignId('tipo_custo_id')->constrained('tipos_custos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipos_subcategorias_custos');
    }
}
