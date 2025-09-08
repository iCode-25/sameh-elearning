<?php

namespace App\Http\Requests\Front\Auth;

use App\Helpers\TranslationHelper;
use Illuminate\Foundation\Http\FormRequest;

class StudentAnswersRequest extends FormRequest
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
        return [
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|exists:quizzes,id',
            'answers.*.correct_answer' => 'required|string',
            'answers.*.student_answer' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'answers.required' => TranslationHelper::translate('Answers are required', 'site'),
            'answers.array' => TranslationHelper::translate('Answers must be an array', 'site'),
            'answers.*.question_id.required' => TranslationHelper::translate('Question ID is required', 'site'),
            'answers.*.question_id.exists' => TranslationHelper::translate('Question ID must exist in quizzes', 'site'),
            'answers.*.correct_answer.required' => TranslationHelper::translate('Correct answer is required', 'site'),
            'answers.*.student_answer.required' => TranslationHelper::translate('Student answer is required', 'site'),
        ];
    }
}
