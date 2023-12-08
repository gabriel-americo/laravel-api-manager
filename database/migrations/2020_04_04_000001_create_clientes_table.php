<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 80);
            $table->string('sobrenome', 80);
            $table->string('user', 40);
            $table->string('email')->unique();
            $table->string('site')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('imagem', 100)->nullable();
            $table->string('password');
            $table->integer('status');
            $table->rememberToken();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
