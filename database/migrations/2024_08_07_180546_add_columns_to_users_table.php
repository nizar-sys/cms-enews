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
        Schema::table('users', function (Blueprint $table) {
            $table->string('business_name')->nullable()->after('remember_token');
            $table->string('address')->nullable()->after('business_name');
            $table->string('contact_person')->nullable()->after('address');
            $table->string('phone')->nullable()->after('contact_person');
            $table->string('mobile_numbers')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['business_name', 'address', 'contact_person', 'phone', 'mobile_numbers']);
        });
    }
};
