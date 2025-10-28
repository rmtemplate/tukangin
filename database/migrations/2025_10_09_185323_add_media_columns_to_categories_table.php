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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('icon_mobile', 255)
                ->nullable()
                ->comment('icon untuk mobile (path/URL)')
                ->after('sort_order');

            $table->string('banner_desktop', 255)
                ->nullable()
                ->comment('banner untuk desktop (path/URL)')
                ->after('icon_mobile');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn([
                'icon_mobile',
                'banner_desktop',
                // 'icon_alt',
                // 'banner_alt',
            ]);
        });
    }
};
