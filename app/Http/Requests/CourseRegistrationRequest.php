<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'course_id'  => ['required', 'exists:courses,id'],
            'full_name'  => ['required', 'string', 'max:255'],
            'email'      => [
                'required', 
                'email', 
                'max:255', 
                new \App\Rules\UniqueUserCourseRegistration($this->course_id)
            ],
            'phone'      => ['required', 'string', 'max:50'],
            'profession' => ['nullable', 'string', 'max:255'],
            'workplace'  => ['nullable', 'string', 'max:255'],
            'notes'      => ['nullable', 'string'],
        ];
    }
}
