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
        Schema::table('technician_areas', function (Blueprint $table) {
            $table->foreign(['technician_id'], 'technician_areas_ibfk_1')->references(['id'])->on('technicians')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['district_id'], 'technician_areas_ibfk_2')->references(['id'])->on('districts')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('technician_areas', function (Blueprint $table) {
            $table->dropForeign('technician_areas_ibfk_1');
            $table->dropForeign('technician_areas_ibfk_2');
        });
    }
};
