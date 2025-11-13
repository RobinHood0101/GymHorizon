<?php

namespace App\Http\Requests\WeekPlan;

use App\Models\TrainingPlan;
use App\Models\WeekPlan;
use Illuminate\Foundation\Http\FormRequest;

class StoreWeekPlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', WeekPlan::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'days' => 'required|array',
            'title' => 'required|string',

            'days.*.day' => 'required|string|max:50',
            'days.*.training_plan_id' => 'nullable',
            'days.*.notes' => 'nullable|string|max:1000',
        ];
    }
}
