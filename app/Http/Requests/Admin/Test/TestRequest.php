<?php

namespace App\Http\Requests\Admin\Test;

use App\Helpers\TranslationHelper;
use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name.ar' => 'required|max:255',
            'name.en' => 'required|max:255',
            'description.ar' => 'required',
            'description.en' => 'required',
            'type' => 'required',

            // 'videos_id'   => 'required_without:packages_id|prohibited_with:packages_id',
            // 'packages_id' => 'required_without:videos_id|prohibited_with:videos_id',
            'videos_id'   => 'nullable|sometimes|required_without:packages_id',
            'packages_id' => 'nullable|sometimes|required_without:videos_id',
            'number_student_questions' => 'required',
                    'pdf' => 'nullable',
            
        ];
    }
    public function messages(): array
    {
        return [
            'name.ar.required' => TranslationHelper::translate('Please Enter Name'),
            'name.en.required' => TranslationHelper::translate('Please Enter Name'),
            'description.ar.string' => TranslationHelper::translate('Description must be a string'),
            'description.en.string' => TranslationHelper::translate('Description must be a string'),

            'number_student_questions.required' => TranslationHelper::translate('Please Enter number_student_questions'),
            'type.required' => TranslationHelper::translate('Please Enter type'),

            
            // 'videos_id.required_without'   => TranslationHelper::translate('Please choose a lesson or package.'),
            // 'packages_id.required_without' => TranslationHelper::translate('Please choose a lesson or package.'),
            // 'videos_id.prohibited_with'    => TranslationHelper::translate('You can only choose one: lesson or package.'),
            // 'packages_id.prohibited_with'  => TranslationHelper::translate('You can only choose one: lesson or package.'),
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->filled('videos_id') && $this->filled('packages_id')) {
                $validator->errors()->add('videos_id', 'You can only choose one: lesson or package.');
                $validator->errors()->add('packages_id', 'You can only choose one: lesson or package.');
            }
        });
    }
}
