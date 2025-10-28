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
        Schema::create('files', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('storage_key')->nullable();
            $table->string('url')->nullable();
            $table->string('mime_type', 120)->nullable()->index('files_index_65');
            $table->integer('size_bytes')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamp('created_at')->nullable();

            $table->index(['created_by', 'created_at'], 'files_index_64');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
