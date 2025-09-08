<?php

namespace App\Http\Requests\Admin\Contact;

use App\Helpers\TranslationHelper;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'title' => 'nullable|max:255',
            'description' => 'nullable',
            'address' => 'nullable',
            'facebook' => 'nullable',
            'whatsapp' => 'nullable',
            'iniesta' => 'nullable',
            'tiktok' => 'nullable',
            'x' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'youtube' => 'nullable',

            
            'meta_image' => 'nullable|image|mimes:png,jpg,jpeg,webp',
            'image_banner' => 'nullable|image|mimes:png,jpg,jpeg,webp',
        ];
    }
    public function messages(): array
    {
        return [
            'address.ar.required' => TranslationHelper::translate('Please Enter address in Arabic'),
            'address.en.required' => TranslationHelper::translate('Please Enter address in English'),
            'facebook.required' => TranslationHelper::translate('Please Enter facebook'),
            'whatsapp.required' => TranslationHelper::translate('Please Enter whatsapp'),
            'iniesta.required' => TranslationHelper::translate('Please Enter iniesta'),
            // 'description.ar.required' => TranslationHelper::translate('Please Enter Description in Arabic'),
            // 'description.en.required' => TranslationHelper::translate('Please Enter Description in English'),
            'meta_image.image' => TranslationHelper::translate('Image is Not Valid'),
            'meta_image.mimes' => TranslationHelper::translate('Image Type is Not Valid'),
            'meta_title.ar.max' => TranslationHelper::translate('Meta Title in Arabic is Too Long'),
            'meta_title.en.max' => TranslationHelper::translate('Meta Title in English is Too Long'),
            'meta_description.ar.max' => TranslationHelper::translate('Meta Description in Arabic is Too Long'),
            'meta_description.en.max' => TranslationHelper::translate('Meta Description in English is Too Long'),
            'meta_tags.ar.max' => TranslationHelper::translate('Meta Tags in Arabic is Too Long'),
            'meta_tags.en.max' => TranslationHelper::translate('Meta Tags in English is Too Long'),
            'alt_text.ar.max' => TranslationHelper::translate('Alt Text in Arabic is Too Long'),
            'alt_text.en.max' => TranslationHelper::translate('Alt Text in English is Too Long'),
            'tiktok.url' => 'رابط تيك توك غير صالح.',
            'x.url' => 'رابط X غير صالح.',
        ];
    }
}
