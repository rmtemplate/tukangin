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
        Schema::create('booking_assignments', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('booking_id')->unique('booking_assignments_index_38');
            $table->integer('technician_id')->index('booking_assignments_index_39');
            $table->integer('assigned_by')->nullable()->comment('Admin/CS yang assign');
            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_assignments');
    }
};
