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
        Schema::create('auth_otps', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('phone', 32)->index('auth_otps_index_2');
            $table->string('code', 10);
            $table->timestamp('expires_at')->nullable()->index('auth_otps_index_4');
            $table->integer('attempts')->nullable()->default(0);
            $table->timestamp('used_at')->nullable();
            $table->timestamp('created_at')->nullable();

            $table->index(['phone', 'code'], 'auth_otps_index_3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auth_otps');
    }
};
