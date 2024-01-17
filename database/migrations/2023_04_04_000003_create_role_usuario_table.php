<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUsuarioTable extends Migration
{
    public function up()
    {
        Schema::create('role_usuario', function (Blueprint $table) {
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('role_usuario');
    }
}
