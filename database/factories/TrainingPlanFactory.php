<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TrainingPlan;
use App\Models\User;

class TrainingPlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TrainingPlan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'duration' => fake()->word(),
            'notes' => fake()->text(),
            'user_id' => 1,
        ];
    }
}
