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
        Schema::table('general_settings', function (Blueprint $table) {
            $table->text('left_icon')->after('footer_logo')->nullable();
            $table->text('center_icon')->after('left_icon')->nullable();
            $table->text('right_icon')->after('center_icon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('general_settings', function (Blueprint $table) {
            $table->dropColumn('left_icon');
            $table->dropColumn('center_icon');
            $table->dropColumn('right_icon');
        });
    }
};
