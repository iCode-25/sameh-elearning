<?php

namespace App\Http\Requests\Admin\ControlExpirationDuration;

use App\Helpers\TranslationHelper;
use Illuminate\Foundation\Http\FormRequest;

class ControlExpirationDurationRequest extends FormRequest
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
            'package_expiration_time' => 'required',
            'lesson_expiration_time' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'package_expiration_time.required' => TranslationHelper::translate('Please Enter package_expiration_time '),
            'lesson_expiration_time.required' => TranslationHelper::translate('Please Enter lesson_expiration_time'),
        ];
    }
}
