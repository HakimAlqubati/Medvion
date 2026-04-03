<?php

namespace App\Services;

use App\Models\CourseRegistration;
use Illuminate\Support\Facades\Log;

class CourseRegistrationService
{
    /**
     * Handle a new course registration.
     *
     * @param array $data
     * @return CourseRegistration|false
     */
    public function registerTrainee(array $data)
    {
        try {
            // Here we encapsulate the business logic in a service class
            $registration = CourseRegistration::create([
                'course_id'  => $data['course_id'],
                'full_name'  => $data['full_name'],
                'email'      => $data['email'],
                'phone'      => $data['phone'],
                'profession' => $data['profession'] ?? null,
                'workplace'  => $data['workplace'] ?? null,
                'notes'      => $data['notes'] ?? null,
                'status'     => 'pending',
            ]);

            // Here we can easily add logic to dispatch jobs, send emails or SMS without bloating the controller
            // Log::info('New registration created for '. $data['email']);

            return $registration;

        } catch (\Exception $e) {
            Log::error('Course Registration Error: ' . $e->getMessage());
            return false;
        }
    }
}
