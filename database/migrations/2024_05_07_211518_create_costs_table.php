<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('costs', function (Blueprint $table) {
            $table->string('name', 120);
            $table->integer('quantity');
            $table->float('price');
            $table->float('discount')->nullable();
            $table->string('attachment', 150)->nullable();
            $table->longText('description')->nullable();
            $table->date('date')->nullable();
            $table->date('due_date')->nullable();
            $table->boolean('status');
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cost_type_id')->constrained('cost_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cost_subcategory_type_id')->constrained('cost_subcategory_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('costs');
    }
};
