<?php

namespace App\Rules;

use App\Models\CourseRegistration;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueUserCourseRegistration implements ValidationRule
{
    protected $courseId;

    public function __construct($courseId)
    {
        $this->courseId = $courseId;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // $value will be the email. We check if there's already a registration for this email and course.
        $exists = CourseRegistration::where('course_id', $this->courseId)
            ->where('email', $value)
            ->exists();

        if ($exists) {
            $fail('land.val_duplicate_registration')->translate();
        }
    }
}
