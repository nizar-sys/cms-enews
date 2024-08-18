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
            $table->foreignId('album_id')->constrained('photo_project_albums')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('photo')->nullable();
            $table->string('photo_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('photo_projects', function (Blueprint $table) {
            //
        });
    }
};
