<?php

namespace App\Services\Frontend;

use App\Models\Survey;
use App\Models\SurveySubmission;
use App\Models\SurveyAnswer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SurveyService
{
    /**
     * Store a survey submission and its answers.
     */
    public function storeSubmission(Survey $survey, array $data): SurveySubmission
    {
        return DB::transaction(function () use ($survey, $data) {
            
            // 1. Identify applicant email for the submission record
            $emailQuestionId = $survey->questions->where('type', 'email')->first()?->id;
            $applicantEmail = $data['answers'][$emailQuestionId] ?? (auth()->user()?->email ?? 'anonymous@medvion.com');

            // 2. Create the submission
            $submission = SurveySubmission::create([
                'survey_id' => $survey->id,
                'applicant_email' => $applicantEmail,
                'user_id' => auth()->id(),
                'status' => 'pending',
                'score' => 0,
            ]);

            // 3. Store answers
            foreach ($data['answers'] as $questionId => $value) {
                if (empty($value)) continue;

                $question = $survey->questions->find($questionId);
                
                $answerData = [
                    'survey_submission_id' => $submission->id,
                    'survey_question_id' => $questionId,
                ];

                if ($question->type === 'file' && request()->hasFile("answers.{$questionId}")) {
                    $file = request()->file("answers.{$questionId}");
                    $path = $file->store("surveys/{$survey->id}/submissions/{$submission->id}", 'public');
                    $answerData['answer_value'] = Storage::url($path);
                    $answerData['answer_json'] = [
                        'name' => $file->getClientOriginalName(),
                        'size' => $file->getSize(),
                        'mime' => $file->getMimeType(),
                        'path' => $path
                    ];
                } else {
                    $answerData['answer_value'] = is_array($value) ? implode(', ', $value) : (string)$value;
                    $answerData['answer_json'] = is_array($value) ? $value : null;
                }

                SurveyAnswer::create($answerData);
            }

            // 4. Trigger Auto-Analysis
            $submission->analyze();

            return $submission;
        });
    }

    /**
     * Group survey questions into sections for frontend display.
     * Note: In a real system, you might have a 'survey_sections' table.
     * Here we group by question order as requested.
     */
    public function getGroupedQuestions(Survey $survey): array
    {
        $questions = $survey->questions->sortBy('order');
        $groups = [];

        // Manual grouping based on the current seeder logic
        // This makes the design "Stepable"
        $groups[] = [
            'id' => 1,
            'title' => 'البيانات الشخصية والأساسية',
            'icon' => 'heroicon-o-user',
            'questions' => $questions->slice(0, 5)
        ];

        $groups[] = [
            'id' => 2,
            'title' => 'الخلفية الأكاديمية والمهنية',
            'icon' => 'heroicon-o-academic-cap',
            'questions' => $questions->slice(5, 6)
        ];

        $groups[] = [
            'id' => 3,
            'title' => 'الخبرة العملية',
            'icon' => 'heroicon-o-briefcase',
            'questions' => $questions->slice(11, 4)
        ];

        $groups[] = [
            'id' => 4,
            'title' => 'القدرات التعليمية والتدريبية',
            'icon' => 'heroicon-o-presentation-chart-line',
            'questions' => $questions->slice(15, 4)
        ];

        $groups[] = [
            'id' => 5,
            'title' => 'التفكير المهني والسريري',
            'icon' => 'heroicon-o-light-bulb',
            'questions' => $questions->slice(19, 3)
        ];

        $groups[] = [
            'id' => 6,
            'title' => 'المحتوى التدريبي المقترح',
            'icon' => 'heroicon-o-document-text',
            'questions' => $questions->slice(22, 4)
        ];

        $groups[] = [
            'id' => 7,
            'title' => 'الجاهزية والالتزام',
            'icon' => 'heroicon-o-clock',
            'questions' => $questions->slice(26, 3)
        ];

        $groups[] = [
            'id' => 8,
            'title' => 'رفع الملفات والوثائق',
            'icon' => 'heroicon-o-cloud-arrow-up',
            'questions' => $questions->slice(29, 2)
        ];

        return $groups;
    }

    /**
     * Return a simple mapping of question_id => step_index.
     * Crucial for the frontend to 'jump' to the correct step on validation error.
     */
    public function getQuestionStepMapping(Survey $survey): array
    {
        $grouped = $this->getGroupedQuestions($survey);
        $mapping = [];

        foreach ($grouped as $stepIndex => $group) {
            foreach ($group['questions'] as $question) {
                $mapping[$question->id] = $stepIndex;
            }
        }

        return $mapping;
    }
}
