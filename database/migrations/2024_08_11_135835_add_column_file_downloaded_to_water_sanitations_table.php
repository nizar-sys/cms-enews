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
        Schema::table('water_sanitations', function (Blueprint $table) {
            $table->string('file_downloaded')->nullable()->after('file')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('water_sanitations', function (Blueprint $table) {
            $table->dropColumn('file_downloaded');
        });
    }
};
