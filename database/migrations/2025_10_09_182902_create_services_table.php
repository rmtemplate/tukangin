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
        Schema::create('services', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('category_id')->index('services_index_11');
            $table->string('sku', 32)->nullable()->index('services_index_12');
            $table->string('name', 120)->nullable();
            $table->string('slug', 100)->nullable()->index('services_index_13')->comment('lowercase-kebab');
            $table->text('description')->nullable();
            $table->decimal('base_price', 12)->nullable()->default(0);
            $table->string('unit', 32)->nullable();
            $table->integer('est_duration_min')->nullable();
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamps();

            $table->index(['is_active', 'category_id'], 'services_index_14');
            $table->unique(['sku'], 'sku');
            $table->unique(['slug'], 'slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
