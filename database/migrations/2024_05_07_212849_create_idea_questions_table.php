<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('idea_questions', function (Blueprint $table) {
            $table->id();
            $table->longText('question');
            $table->longText('answer')->nullable();
            $table->foreignId('idea_id')->constrained('ideas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('idea_questions');
    }
};
