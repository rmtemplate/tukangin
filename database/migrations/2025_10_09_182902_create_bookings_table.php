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
        Schema::create('bookings', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->index('bookings_index_30');
            $table->integer('address_id')->index('bookings_index_31');
            $table->timestamp('schedule_start')->index('bookings_index_32')->comment('Mulai time window');
            $table->timestamp('schedule_end')->comment('Akhir time window (boleh sama dgn start jika exact)');
            $table->enum('status', ['pending', 'assigned', 'confirmed', 'on_the_way', 'in_service', 'completed', 'cancelled', 'no_show'])->nullable()->default('pending');
            $table->enum('payment_method', ['cod', 'transfer', 'ewallet'])->nullable();
            $table->decimal('subtotal', 12)->nullable()->default(0);
            $table->decimal('travel_fee', 12)->nullable()->default(0);
            $table->decimal('discount', 12)->nullable()->default(0);
            $table->decimal('total', 12)->nullable()->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->timestamp('cancelled_at')->nullable();
            $table->text('cancellation_reason')->nullable();

            $table->index(['status', 'schedule_start'], 'bookings_index_33');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
