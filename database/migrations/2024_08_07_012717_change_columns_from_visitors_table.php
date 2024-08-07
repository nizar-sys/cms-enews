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
        Schema::table('visitors', function (Blueprint $table) {
            $table->dropUnique(['ip_address']);
            $table->dropUnique(['user_agent']);
            $table->dropUnique(['url_accessed']);
            $table->dropUnique(['referrer']);
            $table->dropUnique(['session_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visitors', function (Blueprint $table) {
            $table->unique('ip_address');
            $table->unique('user_agent');
            $table->unique('url_accessed');
            $table->unique('referrer');
            $table->unique('session_id');
        });
    }
};
