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
use App\Models\Test;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request)
    {
        try {
            $tests = Test::with('quizzes')->paginate($request->limit ?? 15); 
            $data = TestResource::collection($tests);
            $pagination = new PaginationCollection($tests);
            return $this->success_response_with_pagination($data, 'Test List', $pagination);
        } catch (\Exception $e) {
            return $this->error_response('Some Error Happened', 500);
        }
    }
}
