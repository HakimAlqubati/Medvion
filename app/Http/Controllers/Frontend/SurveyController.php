<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SurveyAnswer;
use App\Models\SurveySubmission;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{
    public function show($id = null)
    {
        $survey = $id 
            ? Survey::where('is_active', true)->with('questions')->findOrFail($id)
            : Survey::where('is_active', true)->with('questions')->firstOrFail();

        return view('frontend.survey', compact('survey'));
    }

    public function store(Request $request)
    {
        $survey = Survey::findOrFail($request->survey_id);
        
        $rules = [
            'survey_id' => 'required|exists:surveys,id',
        ];

        foreach ($survey->questions as $question) {
            if ($question->is_required) {
                $rules['answers.' . $question->id] = 'required';
            }
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            return back()->withErrors($validator)->withInput();
        }

        $submission = SurveySubmission::create([
            'survey_id' => $survey->id,
            'applicant_email' => $request->input('answers.' . $survey->questions->where('type', 'email')->first()?->id) ?? (auth()->user()?->email ?? 'anonymous@medvion.com'),
            'user_id' => auth()->id(),
            'status' => 'pending',
            'score' => 0,
        ]);

        foreach ($request->input('answers', []) as $questionId => $value) {
            SurveyAnswer::create([
                'survey_submission_id' => $submission->id,
                'survey_question_id' => $questionId,
                'answer_value' => is_array($value) ? implode(', ', $value) : (string)$value,
                'answer_json' => is_array($value) ? $value : null,
            ]);
        }

        // Trigger Auto-Analysis
        $submission->analyze();

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', true);
    }
}
