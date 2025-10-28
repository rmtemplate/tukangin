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
        Schema::table('notification_data', function (Blueprint $table) {
            $table->foreign(['notification_id'], 'notification_data_ibfk_1')->references(['id'])->on('notifications')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notification_data', function (Blueprint $table) {
            $table->dropForeign('notification_data_ibfk_1');
        });
    }
};
