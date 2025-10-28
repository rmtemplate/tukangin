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
        Schema::create('coupon_scopes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('coupon_id')->index('coupon_scopes_index_59');
            $table->enum('scope', ['category', 'service', 'city', 'district', 'user'])->nullable();
            $table->integer('ref_id');

            $table->index(['scope', 'ref_id'], 'coupon_scopes_index_60');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_scopes');
    }
};
