<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80);
            $table->longText('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->date('launch_date')->nullable();
            $table->string('creator', 80);
            $table->boolean('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ideas');
    }
};
