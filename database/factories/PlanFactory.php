<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Plan;
use App\Models\User;

class PlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'plan_name' => fake()->word(),
            'duration' => fake()->word(),
            'notes' => fake()->text(),
            'user_id' => 1,
        ];
    }
}
