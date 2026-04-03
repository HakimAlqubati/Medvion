<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRegistrationRequest;
use App\Services\CourseRegistrationService;

class CourseRegistrationController extends Controller
{
    protected $registrationService;

    public function __construct(CourseRegistrationService $registrationService)
    {
        $this->registrationService = $registrationService;
    }

    public function store(CourseRegistrationRequest $request)
    {
        $result = $this->registrationService->registerTrainee($request->validated());

        if ($request->wantsJson()) {
            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => __('land.reg_success_msg')
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => __('land.reg_error_msg')
            ], 500);
        }

        if ($result) {
            return back()->with('success', __('land.reg_success_msg'));
        }

        return back()->withInput()->with('error', __('land.reg_error_msg'));
    }
}
