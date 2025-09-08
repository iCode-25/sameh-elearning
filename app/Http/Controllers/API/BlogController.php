<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserApp\BannerResource;
use App\Http\Resources\UserApp\BlogResource;
use App\Http\Resources\UserApp\PaginationCollection;
use App\Http\Resources\UserApp\PrivacypolicyResource;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Privacypolicy;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request)
    {
        try {
            $Blog = Blog::paginate($request->limit ?? 15);
            $data = BlogResource::collection($Blog);
            $pagination = new PaginationCollection($Blog);
            return $this->success_response_with_pagination($data, 'Blog List', $pagination);
        } catch (\Exception $e) {
            return $this->error_response('Some Error Happened', 500);
        }
    }
    
 
}
