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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('course_id')->nullable();
            $table->integer('session_id')->nullable();
            $table->longText('question')->nullable();
            $table->string('correct_answer')->nullable();
            $table->integer('marks')->nullable();
            $table->text('options')->nullable();
            $table->text('images')->nullable();
            $table->longText('description')->nullable();
            $table->text('desc_images')->nullable();
            $table->text('video_link')->nullable();
            $table->enum('is_publish', ['publish', 'not_publish'])->default('not_publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
