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
        Schema::create('photo_projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('photo');
            $table->string('photo_path');
            $table->foreignId('album_id')->constrained('photo_gallery_albums')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_projects');
    }
};
