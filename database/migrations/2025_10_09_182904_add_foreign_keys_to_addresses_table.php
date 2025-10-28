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
        Schema::table('addresses', function (Blueprint $table) {
            $table->foreign(['city_id'], 'addresses_ibfk_1')->references(['id'])->on('cities')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['district_id'], 'addresses_ibfk_2')->references(['id'])->on('districts')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign('addresses_ibfk_1');
            $table->dropForeign('addresses_ibfk_2');
        });
    }
};
