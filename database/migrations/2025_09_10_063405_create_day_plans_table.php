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
        Schema::create('day_plans', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('notes')->nullable();
            $table->foreignId('plan_id')->constrained('plans')->onDelete('cascade');
            $table->foreignId('week_plan_id')->constrained('week_plans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('day_plans');
    }
};
