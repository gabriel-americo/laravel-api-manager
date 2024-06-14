<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_addresses', 50)->nullable();
            $table->string('last_name_addresses', 50)->nullable();
            $table->string('document_addresses', 20)->nullable();
            $table->string('company_addresses', 80)->nullable();
            $table->date('birth_addresses')->nullable();
            $table->char('sex_addresses', 1)->nullable();
            $table->string('street_addresses', 100)->nullable();
            $table->bigInteger('number_addresses')->nullable();
            $table->string('complement_addresses', 50)->nullable();
            $table->string('district_addresses', 100)->nullable();
            $table->string('city_addresses', 80)->nullable();
            $table->string('zip_addresses', 20)->nullable();
            $table->string('country_addresses', 60)->nullable();
            $table->string('estate_addresses', 50)->nullable();
            $table->string('phone_addresses', 20)->nullable();
            $table->string('cell_addresses', 20)->nullable();
            $table->string('email_addresses')->nullable();
            $table->string('site_addresses')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
