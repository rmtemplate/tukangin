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
        Schema::create('payments', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('booking_id')->index('payments_index_47');
            $table->integer('invoice_id')->nullable()->index('payments_index_48');
            $table->decimal('amount', 12);
            $table->enum('method', ['cod', 'transfer', 'ewallet'])->nullable();
            $table->enum('status', ['pending', 'paid', 'failed', 'refunded'])->nullable()->default('pending')->index('payments_index_49');
            $table->timestamp('paid_at')->nullable();
            $table->string('ref', 120)->nullable()->comment('Reference dari gateway / transfer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
