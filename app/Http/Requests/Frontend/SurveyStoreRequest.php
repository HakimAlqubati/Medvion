<?php

namespace App\Http\Requests\Frontend;

use App\Models\Survey;
use Illuminate\Foundation\Http\FormRequest;

class SurveyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $surveyId = $this->input('survey_id');
        $survey = Survey::with('questions')->find($surveyId);

        if (!$survey) {
            return [
                'survey_id' => 'required|exists:surveys,id',
            ];
        }

        $rules = [
            'survey_id' => 'required|exists:surveys,id',
            'answers'   => 'required|array',
        ];

        foreach ($survey->questions as $question) {
            $fieldName = "answers.{$question->id}";
            $fieldRules = [];

            if ($question->is_required) {
                $fieldRules[] = 'required';
            } else {
                $fieldRules[] = 'nullable';
            }

            // Type-specific validation
            switch ($question->type) {
                case 'email':
                    $fieldRules[] = 'email';
                    break;
                case 'phone':
                    $fieldRules[] = 'string'; // Optional: add regex for phone numbers
                    break;
                case 'file':
                    $fieldRules[] = 'file';
                    $fieldRules[] = 'max:10240'; // 10MB limit
                    break;
                case 'checkboxes':
                    $fieldRules[] = 'array';
                    break;
                default:
                    $fieldRules[] = 'string';
                    break;
            }

            $rules[$fieldName] = $fieldRules;
        }

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        $attributes = [];
        $surveyId = $this->input('survey_id');
        $survey = Survey::with('questions')->find($surveyId);

        if ($survey) {
            foreach ($survey->questions as $question) {
                $attributes["answers.{$question->id}"] = $question->question_text;
            }
        }

        return $attributes;
    }
}
