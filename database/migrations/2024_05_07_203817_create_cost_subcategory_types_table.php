<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cost_subcategory_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 80);
            $table->foreignId('cost_type_id')->constrained('cost_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cost_subcategory_types');
    }
};
