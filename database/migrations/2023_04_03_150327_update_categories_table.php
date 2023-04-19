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
            $table->string('homepage_title')->nullable();
            $table->string('homepage_icon')->nullable();
            $table->string('homepage_image')->nullable();
            $table->longText('homepage_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['homepage_title', 'homepage_icon', 'homepage_image', 'homepage_description']);
        });
    }
};
