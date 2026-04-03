<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('type', 10);
            $table->text('prompt');
            $table->json('options');
            $table->string('correct_option')->nullable();
            $table->unsignedInteger('max_points')->default(1);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['type', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
