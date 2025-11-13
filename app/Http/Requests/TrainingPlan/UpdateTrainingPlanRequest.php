<?php

namespace App\Http\Requests\TrainingPlan;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainingPlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('training_plan'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'duration' => 'required|numeric|max:2000',
            'notes' => 'nullable|string',

            'exercises' => 'nullable|array',
            'exercises.*' => 'exists:exercises,id',

            'weights' => 'nullable|array',
            'weights.*' => 'nullable|numeric|min:0',

            'reps' => 'nullable|array',
            'reps.*' => 'nullable|integer|min:0',

            'sets' => 'nullable|array',
            'sets.*' => 'nullable|integer|min:0',
        ];
    }
}
