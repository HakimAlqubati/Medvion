<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\SurveyStoreRequest;
use App\Models\Survey;
use App\Services\Frontend\SurveyService;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function __construct(
        protected SurveyService $surveyService
    ) {}

    /**
     * Display the cinematic survey page.
     */
    public function show($id = null)
    {
        $survey = $id 
            ? Survey::where('is_active', true)->with('questions')->findOrFail($id)
            : Survey::where('is_active', true)->with('questions')->firstOrFail();

        $groupedQuestions = $this->surveyService->getGroupedQuestions($survey);

        return view('frontend.survey', compact('survey', 'groupedQuestions'));
    }

    /**
     * Handle the AJAX survey submission.
     */
    public function store(SurveyStoreRequest $request)
    {
        $survey = Survey::findOrFail($request->survey_id);
        
        $submission = $this->surveyService->storeSubmission($survey, $request->validated());

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'status' => $submission->status,
                'score' => $submission->score,
            ]);
        }

        return back()->with('success', true);
    }
}
