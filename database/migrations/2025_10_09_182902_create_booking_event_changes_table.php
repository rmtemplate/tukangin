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
        Schema::create('booking_event_changes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('event_id')->index('booking_event_changes_index_42');
            $table->string('field_name', 80)->nullable()->index('booking_event_changes_index_43');
            $table->string('old_value')->nullable();
            $table->string('new_value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_event_changes');
    }
};
