<?php

namespace App\Http\Requests\ExerciseCategory;

use App\Models\ExerciseCategory;
use Illuminate\Foundation\Http\FormRequest;

class StoreExerciseCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', ExerciseCategory::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:exercise_categories,name',
        ];
    }
}
