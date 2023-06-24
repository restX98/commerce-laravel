<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->string('street');
            $table->string('houseNumber');
            $table->string('postalCode');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->timestamps();

            $table->foreignId('customer_id')->index('idx_customer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
