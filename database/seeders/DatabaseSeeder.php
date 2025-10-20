<?php

namespace Database\Seeders;

use App\Models\DayPlan;
use App\Models\Exercise;
use App\Models\ExerciseCategory;
use App\Models\Plan;
use App\Models\User;
use App\Models\WeekPlan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create user with php please make:user
        if (User::where('email', 'robin@localhost')->doesntExist()) {
            User::factory()->create([
                'name' => 'robin',
                'email' => 'robin@localhost',
                'password' => 'robin123',
                'super' => true,
            ]);
        }
        Plan::factory(5)->create();
        DayPlan::factory(5)->create();
        WeekPlan::factory(5)->create();
        Exercise::factory(5)->create();
        ExerciseCategory::factory(5)->create();
    }
}
