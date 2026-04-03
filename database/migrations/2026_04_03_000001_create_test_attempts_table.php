<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('test_attempts', function (Blueprint $table) {
            $table->id();
            $table->string('participant_name')->default('Guest User');
            $table->string('type', 10);
            $table->json('answers');
            $table->unsignedInteger('score');
            $table->unsignedInteger('max_score');
            $table->decimal('percentage', 5, 2)->default(0);
            $table->string('interpretation');
            $table->timestamps();

            $table->index('type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('test_attempts');
    }
};
