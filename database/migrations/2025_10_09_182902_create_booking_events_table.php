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
        Schema::create('booking_events', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('booking_id');
            $table->string('event', 50)->nullable()->index('booking_events_index_41');
            $table->integer('created_by')->nullable();
            $table->string('note')->nullable();
            $table->timestamp('created_at')->nullable();

            $table->index(['booking_id', 'created_at'], 'booking_events_index_40');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_events');
    }
};
