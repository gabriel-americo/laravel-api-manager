<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprovacaoTable extends Migration
{
    public function up()
    {
        Schema::create('aprovacao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('descricao', 80)->nullable();
            $table->boolean('status');
            $table->foreignId('ideias_id')->constrained('ideias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aprovacao');
    }
}
