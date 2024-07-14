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
        Schema::create('spesific_procurement_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spesific_procurement_id')->constrained('spesific_procurements')->onDelete('cascade')->onUpdate('cascade');
            $table->string('file_name');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spesific_procurement_files');
    }
};
