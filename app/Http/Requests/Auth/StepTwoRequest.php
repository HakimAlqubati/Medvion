<?php

namespace App\Http\Requests\Auth;

use App\Rules\YemenPhone;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Step 2 — Address & Contact: phone, city, address.
 */
class StepTwoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'phone'   => ['required', new YemenPhone()],
            'city'    => ['required', 'string', 'max:100'],
            'address' => ['nullable', 'string', 'max:300'],
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required' => __('register.phone_required'),
            'phone.regex'    => __('register.phone_invalid'),
            'city.required'  => __('register.city_required'),
        ];
    }
}
