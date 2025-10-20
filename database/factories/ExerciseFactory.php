<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Exercise;
use App\Models\ExerciseCategory;

class ExerciseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exercise::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'exercise_name' => fake()->word(),
            'description' => fake()->text(),
            'place' => fake()->word(),
            'exercise_category_id' => ExerciseCategory::factory(),
        ];
    }
}
