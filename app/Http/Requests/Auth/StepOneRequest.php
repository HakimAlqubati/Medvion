<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Step 1 — Basic Information (Google Verified).
 */
class StepOneRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if (auth()->check()) {
            return [];
        }

        return [
            'name'  => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'string', 'lowercase', 'email:rfc,dns', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => __('register.name_required'),
            'name.min'       => __('register.name_min'),
            'email.required' => __('register.email_required'),
            'email.email'    => __('register.email_invalid'),
        ];
    }
}
