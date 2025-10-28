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
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('thread_id');
            $table->integer('sender_user_id');
            $table->enum('type', ['text', 'image', 'file', 'system'])->nullable();
            $table->text('text')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('read_at')->nullable();

            $table->index(['thread_id', 'created_at'], 'chat_messages_index_70');
            $table->index(['sender_user_id', 'created_at'], 'chat_messages_index_71');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
    }
};
