<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserApp\BannerResource;
use App\Http\Resources\UserApp\WorkshopsResource;
use App\Http\Resources\UserApp\PaginationCollection;
use App\Http\Resources\UserApp\PrivacypolicyResource;
use App\Http\Resources\UserApp\TestResource;
use App\Models\Banner;
use App\Models\RegistrationWorkshops;
use App\Models\Setting;
use App\Models\Test;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ApiResponseTrait;

    public function index(Request $request)
    {
        try {
            return $this->success_response_with_pagination([
                'lessons_for_teachers_parents' => strip_tags(setting('lessons_for_teachers_parents', app()->getLocale())),
                'sustainability' => strip_tags(setting('sustainability', app()->getLocale())),
                'more_news' => strip_tags(setting('more_news', app()->getLocale())),
                'competition' => strip_tags(setting('competition', app()->getLocale())),

                'about_games' => strip_tags(setting('about_games', app()->getLocale())),
                'stories' => strip_tags(setting('stories', app()->getLocale())),
                'about_video' => strip_tags(setting('about_video', app()->getLocale())),
                'about_workshops' => strip_tags(setting('about_workshops', app()->getLocale())),
            ]);
        } catch (\Exception $e) {
            return $this->error_response('Some Error Happened', 500);
        }
    }

    








    // public function index(Request $request)
    // {
    //     try {
    //         $tests = Setting::with('quizzes')->paginate($request->limit ?? 15); 
    //         $data = SettingResource::collection($tests);
    //         $pagination = new PaginationCollection($tests);
    //         return $this->success_response_with_pagination($data, 'Test List', $pagination);
    //     } catch (\Exception $e) {
    //         return $this->error_response('Some Error Happened', 500);
    //     }
    // }
}
