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
        Schema::table('organizational_chart_section_settings', function (Blueprint $table) {
            $table->longText('sub_title')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organizational_chart_section_settings', function (Blueprint $table) {
            $table->string('sub_title')->nullable()->change();
        });
    }
};
