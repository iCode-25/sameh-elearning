<?php

namespace App\Http\Requests\Front\Auth;

use App\Helpers\TranslationHelper;
use Illuminate\Foundation\Http\FormRequest;

class CouponLessonRequest extends FormRequest
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
            'coupon_code' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'coupon_code.required' => TranslationHelper::translate('Please Enter Coupon Code', 'site'),
            'coupon_code.string' => TranslationHelper::translate('Coupon code must be a string', 'site'),
        ];
    }
}
