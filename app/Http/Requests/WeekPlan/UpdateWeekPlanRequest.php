<?php

namespace App\Http\Requests\WeekPlan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateWeekPlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('week_plan'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'days' => 'required|array|min:1',
            'days.*.id' => [
                'required',
                'integer',
                Rule::exists('day_plans', 'id')->where(function ($query) {
                    $query->where('week_plan_id', $this->route('week_plan')->id);
                }),
            ],
            'days.*.day' => 'required|string|max:50',
            'days.*.training_plan_id' => [
                'nullable',
                'integer',
//                Rule::exists('training_plans', 'id')->where(function ($query) {
//                    $query->where('user_id', $this->user()->id);
//                }),
            ],
            'days.*.notes' => 'nullable|string|max:1000',
        ];
    }
}
