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
        Schema::table('coupon_redemptions', function (Blueprint $table) {
            $table->foreign(['coupon_id'], 'coupon_redemptions_ibfk_1')->references(['id'])->on('coupons')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['booking_id'], 'coupon_redemptions_ibfk_2')->references(['id'])->on('bookings')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coupon_redemptions', function (Blueprint $table) {
            $table->dropForeign('coupon_redemptions_ibfk_1');
            $table->dropForeign('coupon_redemptions_ibfk_2');
        });
    }
};
