<?php

namespace App\Http\Requests\Admin\Videos;

use App\Helpers\TranslationHelper;
use Illuminate\Foundation\Http\FormRequest;

class VideosRequest extends FormRequest
{
    /**
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
            // 'news_video' => 'required',
            'news_video' => $this->isMethod('post') ? 'nullable' : 'nullable',
            'video_url' => $this->isMethod('post') ? 'nullable' : 'nullable',
            
            'azhar_video' => 'nullable',
            'azhar_video_url' => $this->isMethod('post') ? 'nullable' : 'nullable',

            'school_video' => 'nullable',
            'school_video_url' => $this->isMethod('post') ? 'nullable' : 'nullable',
            
            'name.ar' => 'required',
            'name.en' => 'required',
            'image' => 'required_without:id|image',
            'des.ar' => 'required',
            'des.en' => 'required',
            'price' => 'required',
            'news_pdf' => 'nullable',
            'level_id' => 'required|exists:categories,id'
        ];
    }
    public function messages(): array
    {
        return [
            'image.required' => TranslationHelper::translate('Please Upload Image'),
            'image.image' => TranslationHelper::translate('Image is Not Valid'),
            'image.mimes' => TranslationHelper::translate('Image Type is Not Valid'),
            'name.required' => TranslationHelper::translate('Please Type is name'),
            'des.required' => TranslationHelper::translate('Please is des'),
            'price.required' => TranslationHelper::translate('Please Type is name'),
            'news_video.max' => 'حجم الفيديو يجب ألا يتجاوز 150 ميجابايت.',
            'news_pdf.max' => 'حجم الملف يجب ألا يتجاوز 150 ميجابايت.',
            'level_id.required' => TranslationHelper::translate('Please choose acadimic level'),

        ];
    }
}
