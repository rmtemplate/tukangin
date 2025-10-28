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
        Schema::create('payment_logs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('payment_id');
            $table->string('provider', 60)->nullable();
            $table->string('event', 60)->nullable();
            $table->string('status_code', 40)->nullable();
            $table->string('reference', 160)->nullable();
            $table->timestamp('created_at')->nullable();

            $table->index(['payment_id', 'created_at'], 'payment_logs_index_50');
            $table->index(['provider', 'event'], 'payment_logs_index_51');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_logs');
    }
};
