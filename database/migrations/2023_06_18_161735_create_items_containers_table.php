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
        Schema::create('items_containers', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->enum('status', ['cart', 'created', 'shipped'])->default('cart');
            $table->timestamps();

            $table->foreignId('customer_id')->index('idx_customer');
            $table->foreignId('address_id')->index('idx_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_containers');
    }
};
