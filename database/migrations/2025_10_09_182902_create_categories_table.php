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
        Schema::create('categories', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code', 8)->nullable()->unique('categories_index_8');
            $table->string('name', 60)->nullable();
            $table->string('slug', 80)->nullable()->unique('categories_index_9')->comment('lowercase-kebab');
            $table->text('description')->nullable();
            $table->boolean('is_active')->nullable()->default(true);
            $table->integer('sort_order')->nullable()->default(0);
            $table->timestamps();

            $table->index(['is_active', 'sort_order'], 'categories_index_10');
            $table->unique(['slug'], 'slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
