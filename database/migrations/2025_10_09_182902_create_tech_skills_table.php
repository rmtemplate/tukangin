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
        Schema::create('tech_skills', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('technician_id');
            $table->integer('service_id')->index('tech_skills_index_19');
            $table->integer('level')->nullable()->default(1)->comment('1 dasar, 2 mahir, 3 expert');
            $table->timestamp('created_at')->nullable();

            $table->unique(['technician_id', 'service_id'], 'tech_skills_index_18');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tech_skills');
    }
};
