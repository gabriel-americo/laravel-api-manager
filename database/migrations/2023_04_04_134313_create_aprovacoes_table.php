<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprovacoesTable extends Migration
{
    public function up()
    {
        Schema::create('aprovacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('descricao', 80)->nullable();
            $table->boolean('status');
            $table->foreignId('ideia_id')->constrained('ideias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aprovacoes');
    }
}
