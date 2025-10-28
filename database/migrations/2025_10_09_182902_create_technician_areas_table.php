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
        Schema::create('technician_areas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('technician_id');
            $table->integer('district_id')->index('technician_areas_index_29');
            $table->timestamp('created_at')->nullable();

            $table->unique(['technician_id', 'district_id'], 'technician_areas_index_28');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technician_areas');
    }
};
