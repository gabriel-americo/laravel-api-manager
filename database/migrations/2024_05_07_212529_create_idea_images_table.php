<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('idea_images', function (Blueprint $table) {
            $table->id();
            $table->string('caption', 150)->nullable();
            $table->string('image', 150);
            $table->foreignId('idea_id')->constrained('ideas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('idea_images');
    }
};
