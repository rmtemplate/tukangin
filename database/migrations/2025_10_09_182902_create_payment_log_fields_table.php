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
        Schema::create('payment_log_fields', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('payment_log_id')->index('payment_log_fields_index_52');
            $table->string('field_key', 100)->nullable()->index('payment_log_fields_index_53');
            $table->text('field_value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_log_fields');
    }
};
