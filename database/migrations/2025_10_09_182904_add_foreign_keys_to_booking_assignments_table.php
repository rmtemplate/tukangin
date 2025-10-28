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
        Schema::table('booking_assignments', function (Blueprint $table) {
            $table->foreign(['booking_id'], 'booking_assignments_ibfk_1')->references(['id'])->on('bookings')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['technician_id'], 'booking_assignments_ibfk_2')->references(['id'])->on('technicians')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking_assignments', function (Blueprint $table) {
            $table->dropForeign('booking_assignments_ibfk_1');
            $table->dropForeign('booking_assignments_ibfk_2');
        });
    }
};
