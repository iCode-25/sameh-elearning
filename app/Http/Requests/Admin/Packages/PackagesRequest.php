<?php

namespace App\Http\Requests\Admin\Packages;

use App\Helpers\TranslationHelper;
use Illuminate\Foundation\Http\FormRequest;

class PackagesRequest extends FormRequest
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
            'image' => 'required_without:id|image|mimes:png,jpg,jpeg,webp|nullable',
            'pdf' => 'nullable',
            // 'date' => ['required', 'date', 'after_or_equal:today'],
            'is_active' => 'nullable',
            // 'price' => 'required',
            // 'discount' => 'nullable',
            'discount' => 'nullable|numeric|min:0',

            'price' => 'required|numeric|min:0',

            'level_id' => 'required|exists:categories,id'


        ];
    }
    public function messages(): array
    {
        return [
            'name.ar.required' => TranslationHelper::translate('Please Enter Name'),
            'name.en.required' => TranslationHelper::translate('Please Enter Name'),
            'price.required' => TranslationHelper::translate('Please Enter price'),
            'image.required_without' => TranslationHelper::translate(key: 'Please Upload Image'),
            'image.image' => TranslationHelper::translate('Image is Not Valid'),
            'image.mimes' => TranslationHelper::translate('Image Type is Not Valid'),
            'description.ar.string' => TranslationHelper::translate('Description must be a string'),
            'description.en.string' => TranslationHelper::translate('Description must be a string'),
            'level_id.required' => TranslationHelper::translate('Please choose acadimic level'),

            // 'date.required' => TranslationHelper::translate('Please Enter date'),
            // 'date.after_or_equal' => TranslationHelper::translate('The date must be today or later'),
        ];
    }
}
