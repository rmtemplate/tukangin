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
        Schema::create('service_addons', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('service_id');
            $table->string('name', 120)->nullable();
            $table->decimal('price', 12)->nullable()->default(0);
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamps();

            $table->index(['service_id', 'is_active'], 'service_addons_index_15');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_addons');
    }
};
