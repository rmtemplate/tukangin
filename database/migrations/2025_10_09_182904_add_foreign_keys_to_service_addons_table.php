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
        Schema::table('service_addons', function (Blueprint $table) {
            $table->foreign(['service_id'], 'service_addons_ibfk_1')->references(['id'])->on('services')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_addons', function (Blueprint $table) {
            $table->dropForeign('service_addons_ibfk_1');
        });
    }
};
