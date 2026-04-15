<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Step 3 — Educational Data: specialty, qualification, graduation_year, workplace.
 */
class StepThreeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'specialty'       => ['required', 'string', 'max:150'],
            'qualification'   => ['required', 'string', 'max:150'],
            'graduation_year' => ['required', 'integer', 'min:1970', 'max:' . date('Y')],
            'workplace'       => ['nullable', 'string', 'max:200'],
        ];
    }

    public function messages(): array
    {
        return [
            'specialty.required'       => __('register.specialty_required'),
            'qualification.required'   => __('register.qualification_required'),
            'graduation_year.required' => __('register.graduation_year_required'),
            'graduation_year.integer'  => __('register.graduation_year_invalid'),
            'graduation_year.min'      => __('register.graduation_year_range'),
            'graduation_year.max'      => __('register.graduation_year_range'),
        ];
    }
}
