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
<<<<<<<< HEAD:database/migrations/2025_05_13_130813_create_teachers_table.php
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('session');
            $table->string('password');
            $table->string('status')->default('active');
========
        Schema::create('custom_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('session_year', 40)->nullable();
            $table->dateTime('created_date')->nullable();
            $table->tinyInteger('is_selected')->default(0);
>>>>>>>> a3bcbafc3562183d08e31e4f7a6df7c26270d606:database/migrations/2025_05_14_075857_create_custom_sessions_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<<< HEAD:database/migrations/2025_05_13_130813_create_teachers_table.php
        Schema::dropIfExists('teachers');
========
        Schema::dropIfExists('custom_sessions');
>>>>>>>> a3bcbafc3562183d08e31e4f7a6df7c26270d606:database/migrations/2025_05_14_075857_create_custom_sessions_table.php
    }
};
