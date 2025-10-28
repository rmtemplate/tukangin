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
        Schema::table('payment_log_fields', function (Blueprint $table) {
            $table->foreign(['payment_log_id'], 'payment_log_fields_ibfk_1')->references(['id'])->on('payment_logs')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_log_fields', function (Blueprint $table) {
            $table->dropForeign('payment_log_fields_ibfk_1');
        });
    }
};
