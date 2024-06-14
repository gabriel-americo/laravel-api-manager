<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supplier', 150);
            $table->string('site', 120)->nullable();
            $table->string('name_contact', 80)->nullable();
            $table->string('email', 80)->nullable();
            $table->string('phone', 80)->nullable();
            $table->string('address', 150)->nullable();
            $table->longText('observation')->nullable();
            $table->boolean('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
