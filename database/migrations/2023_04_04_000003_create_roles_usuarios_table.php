<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('roles_usuarios', function (Blueprint $table) {
            $table->foreignId('usuarios_id')->constrained('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('roles_id')->constrained('roles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles_usuarios');
    }
}
