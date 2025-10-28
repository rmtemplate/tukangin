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
        Schema::create('coupon_redemptions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('coupon_id')->index('coupon_redemptions_index_61');
            $table->integer('user_id')->index('coupon_redemptions_index_62');
            $table->integer('booking_id')->unique('coupon_redemptions_index_63');
            $table->timestamp('used_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_redemptions');
    }
};
