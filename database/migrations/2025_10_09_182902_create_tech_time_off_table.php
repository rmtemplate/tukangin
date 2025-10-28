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
        Schema::create('tech_time_off', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('technician_id')->index('tech_time_off_index_21');
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->string('reason', 160)->nullable();
            $table->timestamp('created_at')->nullable();

            $table->index(['starts_at', 'ends_at'], 'tech_time_off_index_22');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tech_time_off');
    }
};
