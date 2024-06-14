<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_shippings', 50)->nullable();
            $table->string('last_name_shippings', 50)->nullable();
            $table->string('company_shippings', 80)->nullable();
            $table->string('street_shippings', 100)->nullable();
            $table->bigInteger('number_shippings')->nullable();
            $table->string('complement_shippings', 50)->nullable();
            $table->string('district_shippings', 100)->nullable();
            $table->string('city_shippings', 80)->nullable();
            $table->string('zip_shippings', 20)->nullable();
            $table->string('country_shippings', 60)->nullable();
            $table->string('estate_shippings', 50)->nullable();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
