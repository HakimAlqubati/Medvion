<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

/**
 * Final full-registration request — combines all step validations.
 */
class RegisterUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Step 1
            'name'                  => ['required', 'string', 'min:3', 'max:100'],
            'email'                 => ['required', 'string', 'lowercase', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            'password'              => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
            'password_confirmation' => ['required'],
            // Step 2
            'phone'                 => ['required', 'string', 'regex:/^[\+\d\s\-]{7,20}$/'],
            'city'                  => ['required', 'string', 'max:100'],
            'address'               => ['nullable', 'string', 'max:300'],
            // Step 3
            'specialty'             => ['required', 'string', 'max:150'],
            'qualification'         => ['required', 'string', 'max:150'],
            'graduation_year'       => ['required', 'integer', 'min:1970', 'max:' . date('Y')],
            'workplace'             => ['nullable', 'string', 'max:200'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'            => __('register.name_required'),
            'email.required'           => __('register.email_required'),
            'email.unique'             => __('register.email_taken'),
            'password.required'        => __('register.password_required'),
            'password.confirmed'       => __('register.password_confirmed'),
            'phone.required'           => __('register.phone_required'),
            'city.required'            => __('register.city_required'),
            'specialty.required'       => __('register.specialty_required'),
            'qualification.required'   => __('register.qualification_required'),
            'graduation_year.required' => __('register.graduation_year_required'),
        ];
    }
}
