<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 80);
            $table->string('last_name', 80)->nullable();
            $table->string('user', 40);
            $table->string('email')->unique();
            $table->string('site')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('image', 100)->nullable();
            $table->string('password');
            $table->integer('status');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
