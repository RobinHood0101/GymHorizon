<?php

namespace Database\Factories;

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
            'plan_id' => Plan::factory(),
        ];
    }
}
