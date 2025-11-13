<?php

namespace App\Http\Requests\WeekPlan;

use Illuminate\Foundation\Http\FormRequest;

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
            'days' => 'required|array',
            'title' => 'required|string',
        ];
    }
}
