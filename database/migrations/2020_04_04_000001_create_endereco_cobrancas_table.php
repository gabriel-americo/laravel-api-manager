<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoCobrancasTable extends Migration
{
    public function up()
    {
        Schema::create('endereco_cobrancas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_cobrancas', 50)->nullable();
            $table->string('sobrenome_cobrancas', 50)->nullable();
            $table->string('cpf_cobrancas', 20)->nullable();
            $table->string('cnpj_cobrancas', 20)->nullable();
            $table->string('empresa_cobrancas', 80)->nullable();
            $table->date('nascimento_cobrancas')->nullable();
            $table->char('sexo_cobrancas', 1)->nullable();
            $table->string('rua_cobrancas', 100)->nullable();
            $table->bigInteger('numero_cobrancas')->nullable();
            $table->string('complemento_cobrancas', 50)->nullable();
            $table->string('bairro_cobrancas', 100)->nullable();
            $table->string('cidade_cobrancas', 80)->nullable();
            $table->string('cep_cobrancas', 20)->nullable();
            $table->string('pais_cobrancas', 60)->nullable();
            $table->string('estado_cobrancas', 50)->nullable();
            $table->string('telefone_cobrancas', 20)->nullable();
            $table->string('celular_cobrancas', 20)->nullable();
            $table->string('email_cobrancas')->nullable();
            $table->string('site_cobrancas')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->unsignedBigInteger('clientes_id');
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('endereco_cobrancas', function($table) {
            $table->foreign('clientes_id')->references('id')->on('clientes')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('endereco_cobrancas');
    }
}
