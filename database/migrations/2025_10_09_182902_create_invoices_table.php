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
        Schema::create('invoices', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('booking_id')->index('invoices_index_44');
            $table->string('number', 40)->nullable()->unique('number');
            $table->enum('status', ['draft', 'issued', 'void', 'paid', 'refunded'])->nullable()->default('issued')->index('invoices_index_45');
            $table->decimal('amount_due', 12);
            $table->decimal('amount_paid', 12)->nullable()->default(0);
            $table->timestamp('issued_at')->nullable()->index('invoices_index_46');
            $table->timestamp('due_at')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
