<?php

namespace App\Http\Requests\Admin\Card;

use App\Helpers\TranslationHelper;
use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
            // 'card_video' => 'nullable|mimes:max:204800',
            'card_video' => 'nullable|mimes:mp4,mov,avi,wmv|max:512000', // 500MB

            // mp4,avi,mov|
            // 'image' => 'required',
            'image' => request()->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' : 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            // 'category_id' => 'required',
            // 'video' => 'nullable|mimes:mp4,avi,mov,wmv|max:10240',
            // 'title' => 'required',
            'des' => 'required',
            'price' => 'required',
            
            'categorycolid_id' => 'required',

            'category_card' => 'required',

            
          
        ];
    }
    public function messages(): array
    {
        return [

            'image.required' => TranslationHelper::translate('Please Upload Image'),
            'image.image' => TranslationHelper::translate('Image is Not Valid'),
            'image.mimes' => TranslationHelper::translate('Image Type is Not Valid'),
             'des.required' => TranslationHelper::translate('Please Upload des'),
            'categorycolid_id.required' => TranslationHelper::translate('Please Upload categorycolid_id'),
            'category_card.required' => TranslationHelper::translate('Please Upload category_card'),
            'card_video.max' => 'حجم الفيديو يجب ألا يتجاوز 20 ميجابايت.',

            'price.required' => TranslationHelper::translate('Please Upload price'),

        ];
    }
}
