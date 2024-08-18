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
        Schema::table('photo_projects', function (Blueprint $table) {
            $table->dropForeign(['album_id']);
            $table->dropColumn(['photo', 'photo_path', 'album_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('photo_projects', function (Blueprint $table) {
            $table->string('photo');
            $table->string('photo_path');
            $table->foreignId('album_id')->constrained('photo_gallery_albums')->onDelete('cascade')->onUpdate('cascade');
        });
    }
};
