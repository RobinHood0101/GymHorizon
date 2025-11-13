<?php

namespace App\Http\Requests\ExerciseCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateExerciseCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('exercise_category'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $exerciseCategory = $this->route('exerciseCategory');

        return [
            'name' => [
                'required', 'string', 'max:255',
                Rule::unique('exercise_categories', 'name')->ignore($exerciseCategory?->id)
            ],
        ];
    }
}
