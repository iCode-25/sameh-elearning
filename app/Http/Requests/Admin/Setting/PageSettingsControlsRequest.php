<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class PageSettingsControlsRequest extends FormRequest
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

            'image_banner_page_about'=> 'sometimes',

            'title_about_us.en' => 'sometimes',
            'title_about_us.ar' => 'sometimes',

            'description_about_us.en' => 'sometimes',
            'description_about_us.ar' => 'sometimes',

            'image_section_video_about' => 'sometimes',
            'video_page_about' => 'sometimes',




            // 'lessons_for_teachers_parents.en' => 'required',
            // 'lessons_for_teachers_parents.ar' => 'required',

            // 'sustainability.en' => 'required',
            // 'sustainability.ar' => 'required',

            // 'more_news.en' => 'required',
            // 'more_news.ar' => 'required',

            // 'competition.en' => 'required',
            // 'competition.ar' => 'required',

            // 'about_games.en' => 'required',
            // 'about_games.ar' => 'required',

            // 'stories.en' => 'required',
            // 'stories.ar' => 'required',

            // 'about_video.en' => 'required',
            // 'about_video.ar' => 'required',

            // 'about_workshops.en' => 'required',
            // 'about_workshops.ar' => 'required',

            // 'title.en' => 'required',
            // 'title.ar' => 'required',



            // 'image_one_news'=> 'sometimes',

        ];
    }}
