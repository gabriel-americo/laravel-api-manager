<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustosTable extends Migration
{
    public function up()
    {
        Schema::create('custos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 120);
            $table->integer('qtd');
            $table->float('preco');
            $table->float('desconto')->nullable();
            $table->string('anexo', 150)->nullable();
            $table->longText('descricao')->nullable();
            $table->date('data')->nullable();
            $table->date('data_vencimento')->nullable();
            $table->boolean('status');
            $table->foreignId('fornecedor_id')->constrained('fornecedores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tipo_custo_id')->constrained('tipos_custos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tipo_subcategoria_custo_id')->constrained('tipos_subcategorias_custos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('custos');
    }
}
