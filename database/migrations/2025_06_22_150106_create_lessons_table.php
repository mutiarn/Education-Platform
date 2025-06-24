<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('duration'); // e.g., "15:30"
            $table->string('video_url')->nullable();
            $table->integer('order')->default(0); // For lesson ordering
            $table->enum('type', ['video', 'text', 'link'])->default('video');
            $table->boolean('is_free')->default(false); // Some lessons can be free preview
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lessons');
    }
};
