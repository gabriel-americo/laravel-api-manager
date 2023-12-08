<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoEnviosTable extends Migration
{
    public function up()
    {
        Schema::create('endereco_envios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_envios', 50)->nullable();
            $table->string('sobrenome_envios', 50)->nullable();
            $table->string('empresa_envios', 80)->nullable();
            $table->string('rua_envios', 100)->nullable();
            $table->bigInteger('numero_envios')->nullable();
            $table->string('complemento_envios', 50)->nullable();
            $table->string('bairro_envios', 100)->nullable();
            $table->string('cidade_envios', 80)->nullable();
            $table->string('cep_envios', 20)->nullable();
            $table->string('pais_envios', 60)->nullable();
            $table->string('estado_envios', 50)->nullable();

            $table->unsignedBigInteger('clientes_id');
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('endereco_envios', function($table) {
            $table->foreign('clientes_id')->references('id')->on('clientes')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('endereco_envios');
    }
}
