<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Requests\Auth\StepOneRequest;
use App\Http\Requests\Auth\StepTwoRequest;
use App\Http\Requests\Auth\StepThreeRequest;
use App\Services\Auth\UserRegistrationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function __construct(
        protected UserRegistrationService $registrationService
    ) {}

    /**
     * Display the multi-step registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * AJAX — validate a specific step without persisting data.
     * Resolves the appropriate Form Request class for the given step,
     * runs validation, and returns a JSON response.
     */
    public function validateStep(Request $request, int $step): JsonResponse
    {
        $requestClass = match ($step) {
            1 => StepOneRequest::class,
            2 => StepTwoRequest::class,
            3 => StepThreeRequest::class,
            default => null,
        };

        if (! $requestClass) {
            return response()->json(['message' => 'Invalid step.'], 422);
        }

        // Manually resolve and run validation; invalid input triggers a
        // ValidationException which Laravel serialises to a 422 JSON response.
        /** @var \Illuminate\Foundation\Http\FormRequest $formRequest */
        $formRequest = app($requestClass);
        $formRequest->setContainer(app());
        $formRequest->initialize(
            $request->query->all(),
            $request->request->all(),
            [], [], [], $request->server->all()
        );
        $formRequest->setMethod($request->method());
        $formRequest->merge($request->all());

        $validator = \Illuminate\Support\Facades\Validator::make(
            $request->all(),
            $formRequest->rules(),
            $formRequest->messages()
        );

        if ($validator->fails()) {
            return response()->json([
                'valid'   => false,
                'errors'  => $validator->errors()->toArray(),
                'message' => $validator->errors()->first(),
            ], 422);
        }

        return response()->json(['valid' => true]);
    }

    /**
     * Handle the final registration request.
     * Supports both standard form POST and AJAX (expects JSON response).
     */
    public function store(RegisterUserRequest $request): JsonResponse|RedirectResponse
    {
        $this->registrationService->register($request->validated());

        $redirectUrl = session()->pull('url.intended', route('courses.index'));

        if ($request->expectsJson()) {
            return response()->json(['redirect' => $redirectUrl]);
        }

        return redirect($redirectUrl);
    }
}
