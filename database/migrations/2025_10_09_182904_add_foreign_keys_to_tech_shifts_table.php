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
        Schema::table('tech_shifts', function (Blueprint $table) {
            $table->foreign(['technician_id'], 'tech_shifts_ibfk_1')->references(['id'])->on('technicians')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tech_shifts', function (Blueprint $table) {
            $table->dropForeign('tech_shifts_ibfk_1');
        });
    }
};
