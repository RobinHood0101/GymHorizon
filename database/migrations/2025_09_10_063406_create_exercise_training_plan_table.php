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
        Schema::create('exercise_training_plan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercise_id')->constrained('exercises')->onDelete('cascade');
            $table->foreignId('training_plan_id')->constrained('training_plans')->onDelete('cascade');
            $table->integer('weight')->nullable();
            $table->integer('repetitions')->nullable();
            $table->integer('sets')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_training_plan');
    }
};
