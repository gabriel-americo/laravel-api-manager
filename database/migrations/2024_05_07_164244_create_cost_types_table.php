<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cost_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 80);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cost_types');
    }
};
