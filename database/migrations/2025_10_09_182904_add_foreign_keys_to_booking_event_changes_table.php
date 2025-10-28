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
        Schema::table('booking_event_changes', function (Blueprint $table) {
            $table->foreign(['event_id'], 'booking_event_changes_ibfk_1')->references(['id'])->on('booking_events')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking_event_changes', function (Blueprint $table) {
            $table->dropForeign('booking_event_changes_ibfk_1');
        });
    }
};
