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
        Schema::create('tech_locations', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->integer('technician_id');
            $table->decimal('lat', 10, 6)->nullable();
            $table->decimal('lng', 10, 6)->nullable();
            $table->timestamp('recorded_at')->nullable();

            $table->index(['technician_id', 'recorded_at'], 'tech_locations_index_23');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tech_locations');
    }
};
