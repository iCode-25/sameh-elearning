<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class AboutSettingRequest extends FormRequest
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
            'description_Mission_Statement.en' => 'sometimes',
            'description_Mission_Statement.ar' => 'sometimes',

            'description_Vision.en' => 'sometimes',
            'description_Vision.ar' => 'sometimes',

            'description_What_We_Offer.en' => 'sometimes',
            'description_What_We_Offer.ar' => 'sometimes',

            'description_Values.en' => 'sometimes',
            'description_Values.ar' => 'sometimes',



            // section __one
            'section_one_title_one.en' => 'sometimes',
            'section_one_title_one.ar' => 'sometimes',

            'section_one_description.en' => 'sometimes',
            'section_one_description.ar' => 'sometimes',

            'section_one_title_two.en' => 'sometimes',
            'section_one_title_two.ar' => 'sometimes',

            'section_one_title_three.en' => 'sometimes',
            'section_one_title_three.ar' => 'sometimes',

            'section_one_title_four.en' => 'sometimes',
            'section_one_title_four.ar' => 'sometimes',


            'section_one_number.en' => 'sometimes',
            'section_one_number.ar' => 'sometimes',

            'section_one_image_one' => 'sometimes',
            
            'section_one_image_two' => 'sometimes',
            
            // section __tow
            'section_tow_title_one.en' => 'sometimes',
            'section_tow_title_one.ar' => 'sometimes',

            'section_tow_description_one.en' => 'sometimes',
            'section_tow_description_one.ar' => 'sometimes',
            
            
        
        ];
    }}
