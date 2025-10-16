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
        Schema::create('project_plugins', function (Blueprint $table) {
            $table->id();
            $table->string('plugin_name', 255);
            $table->string('display_name', 255);
            $table->integer('amount_used');
            $table->string('release', 50);
            $table->string('version', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_plugins');
    }
};
