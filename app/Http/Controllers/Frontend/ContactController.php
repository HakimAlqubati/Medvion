<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\StoreContactMessageRequest;
use App\Services\Frontend\ContactService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display the contact form page.
     */
    public function index(): View
    {
        return view('contact');
    }

    /**
     * Store a new contact message asynchronously via Ajax.
     *
     * @param StoreContactMessageRequest $request
     * @param ContactService $service
     * @return JsonResponse
     */
    public function store(StoreContactMessageRequest $request, ContactService $service): JsonResponse
    {
        $service->storeMessage($request->validated());

        return response()->json([
            'success' => true,
            'message' => __('land.contact_success_message', [], 'ar') ?? 'تم استلام رسالتك بنجاح. سيقوم فريقنا بالرد عليك في أقرب وقت عبر البريد أو الهاتف.'
        ], 201);
    }
}
