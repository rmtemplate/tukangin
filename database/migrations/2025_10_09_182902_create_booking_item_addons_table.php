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
        Schema::create('booking_item_addons', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('booking_item_id')->index('booking_item_addons_index_36');
            $table->integer('addon_id')->index('booking_item_addons_index_37');
            $table->string('addon_name', 120)->nullable();
            $table->decimal('addon_price', 12)->nullable();
            $table->integer('qty')->nullable()->default(1);
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_item_addons');
    }
};
