<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 80);
            $table->string('user', 40);
            $table->string('email')->unique();
            $table->string('sexo', 20);
            $table->string('imagem', 100)->nullable();
            $table->timestamp('ultimo_login')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('status');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
