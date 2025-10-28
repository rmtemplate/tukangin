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
        Schema::create('technicians', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->nullable()->unique('user_id')->comment('Opsional: teknisi juga punya akun user');
            $table->string('name', 120)->nullable();
            $table->string('phone', 32)->nullable()->index('technicians_index_17');
            $table->decimal('rating', 3)->nullable()->default(0);
            $table->boolean('active')->nullable()->default(true)->index('technicians_index_16');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technicians');
    }
};
