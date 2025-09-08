<?php

namespace App\Http\Requests\Admin\Coupon;

use App\Helpers\TranslationHelper;
use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'group_id' => 'required',
            'new_group_name' => 'nullable|string|max:255',
            'number' => 'required',
            'is_valid'=> 'nullable',
            'points' => 'required|integer|min:0',
            // 'validate_to' => 'nullable|date|after:today',
            'type_group' => 'required|in:package,lessons',
            
            
        ];
    }
    public function messages(): array
    {
        return [
            'group_id.required' => TranslationHelper::translate('Please Enter group_id in English'),
            'code.required' => TranslationHelper::translate('Please Enter code in English'),
            'product_id.required' => TranslationHelper::translate('Please Enter product_id in English'),
            'type_group.required' => TranslationHelper::translate('Please Enter type group in English'),
            'points.required' => TranslationHelper::translate('Please Enter Coupon Price in English'),

            
            // 'name.en.required' => TranslationHelper::translate('Please Enter Name in English'),
            // 'name.ar.required' => TranslationHelper::translate('Please Enter Name in Arabic'),

            // 'address.en.required' => TranslationHelper::translate('Please Enter address in English'),
            // 'address.ar.required' => TranslationHelper::translate('Please Enter address in Arabic'),


            // 'google_map.required' => TranslationHelper::translate('Please Enter google_map in English'),

            // 'city_id.required' => TranslationHelper::translate('Please Enter city_id in English'),




        ];
    }

    private function getProductIds()
    {
        return \App\Models\Product::pluck('id')->toArray();
    }
}
