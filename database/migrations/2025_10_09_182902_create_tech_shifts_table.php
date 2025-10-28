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
        Schema::create('tech_shifts', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('technician_id');
            $table->integer('weekday')->nullable()->comment('0=Sun ... 6=Sat');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->timestamps();

            $table->index(['technician_id', 'weekday'], 'tech_shifts_index_20');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tech_shifts');
    }
};
