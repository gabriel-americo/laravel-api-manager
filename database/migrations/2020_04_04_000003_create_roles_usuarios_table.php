<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('roles_usuarios', function (Blueprint $table) {
            $table->unsignedBigInteger('usuarios_id');
            $table->unsignedBigInteger('roles_id');
        });

        Schema::table('roles_usuarios', function($table) {
            $table->foreign('roles_id')->references('id')->on('roles')
                ->onDelete('cascade')->onUpdade('cascade');
            $table->foreign('usuarios_id')->references('id')->on('usuarios')
                ->onDelete('cascade')->onUpdade('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles_usuarios');
    }
}
