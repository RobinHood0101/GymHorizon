<?php

namespace Database\Factories;

use App\Models\WeekPlan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\DayPlan;
use App\Models\Plan;

class DayPlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DayPlan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'day' => fake()->date(),
            'notes' => fake()->text(),
            'plan_id' => Plan::factory(),
            'week_plan_id' => WeekPlan::factory(),
        ];
    }
}
