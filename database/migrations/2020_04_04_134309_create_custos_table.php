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

            $table->unsignedBigInteger('fornecedores_id');
            $table->unsignedBigInteger('tipo_custos_id');
            $table->unsignedBigInteger('tipo_subcategoria_custos_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('custos', function($table) {
            $table->foreign('fornecedores_id')->references('id')->on('fornecedores')
                ->onDelete('cascade')->onUpdade('cascade');
            $table->foreign('tipo_custos_id')->references('id')->on('tipo_custos')
                ->onDelete('cascade')->onUpdade('cascade');
            $table->foreign('tipo_subcategoria_custos_id')->references('id')->on('tipo_subcategoria_custos')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('custos');
    }
}
