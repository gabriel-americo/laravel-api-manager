<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedoresTable extends Migration
{
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fornecedor', 150);
            $table->string('site', 120)->nullable();
            $table->string('contato', 80)->nullable();
            $table->string('email', 80)->nullable();
            $table->string('telefone', 80)->nullable();
            $table->string('endereco', 150)->nullable();
            $table->longText('observacao')->nullable();
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fornecedores');
    }
}
