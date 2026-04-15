<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

/**
 * Step 1 — Basic Information: name, email, password.
 */
class StepOneRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'                  => ['required', 'string', 'min:3', 'max:100'],
            'email'                 => ['required', 'string', 'lowercase', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            'password'              => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
            'password_confirmation' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => __('register.name_required'),
            'name.min'             => __('register.name_min'),
            'email.required'       => __('register.email_required'),
            'email.email'          => __('register.email_invalid'),
            'email.unique'         => __('register.email_taken'),
            'password.required'    => __('register.password_required'),
            'password.confirmed'   => __('register.password_confirmed'),
            'password.min'         => __('register.password_min'),
        ];
    }
}
