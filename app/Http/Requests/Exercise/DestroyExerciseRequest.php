<?php

namespace App\Http\Requests\Exercise;

use App\Models\Exercise;
use Illuminate\Foundation\Http\FormRequest;

class DestroyExerciseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('forceDelete', $this->route('exercise'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
