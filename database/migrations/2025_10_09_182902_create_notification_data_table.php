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
        Schema::create('notification_data', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('notification_id')->index('notification_data_index_76');
            $table->string('data_key', 80)->nullable()->index('notification_data_index_77');
            $table->string('data_value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_data');
    }
};
