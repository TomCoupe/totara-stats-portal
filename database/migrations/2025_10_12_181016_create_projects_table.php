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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191)->unique();
            $table->text('description')->nullable();
            $table->string('php_version', 50)->nullable();
            $table->string('totara_version', 50)->nullable();
            $table->string('mysql_version', 50)->nullable();
            $table->unsignedInteger('total_courses')->default(0);
            $table->unsignedInteger('total_users')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
