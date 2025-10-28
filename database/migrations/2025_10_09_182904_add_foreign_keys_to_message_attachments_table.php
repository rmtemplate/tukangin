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
        Schema::table('message_attachments', function (Blueprint $table) {
            $table->foreign(['message_id'], 'message_attachments_ibfk_1')->references(['id'])->on('chat_messages')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['file_id'], 'message_attachments_ibfk_2')->references(['id'])->on('files')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('message_attachments', function (Blueprint $table) {
            $table->dropForeign('message_attachments_ibfk_1');
            $table->dropForeign('message_attachments_ibfk_2');
        });
    }
};
