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
//        User::factory()->create([
//            'name' => 'robin',
//            'email' => 'robin@localhost',
//            'password' => 'robin123',
//        ]);
//        User::factory(10)->create();
//        Plan::factory(10)->create();
//        DayPlan::factory(10)->create();
//        WeekPlan::factory(10)->create();
        Exercise::factory(10)->create();
        ExerciseCategory::factory(10)->create();
    }
}
