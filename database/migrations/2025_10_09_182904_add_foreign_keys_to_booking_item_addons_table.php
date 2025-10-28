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
        Schema::table('booking_item_addons', function (Blueprint $table) {
            $table->foreign(['booking_item_id'], 'booking_item_addons_ibfk_1')->references(['id'])->on('booking_items')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['addon_id'], 'booking_item_addons_ibfk_2')->references(['id'])->on('service_addons')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking_item_addons', function (Blueprint $table) {
            $table->dropForeign('booking_item_addons_ibfk_1');
            $table->dropForeign('booking_item_addons_ibfk_2');
        });
    }
};
