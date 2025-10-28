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
        Schema::create('booking_items', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('booking_id')->index('booking_items_index_34');
            $table->integer('service_id')->index('booking_items_index_35');
            $table->string('service_sku', 32)->nullable();
            $table->string('service_name', 120)->nullable();
            $table->string('unit', 32)->nullable();
            $table->integer('qty')->nullable()->default(1);
            $table->decimal('price', 12)->nullable()->default(0);
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_items');
    }
};
