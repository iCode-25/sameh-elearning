<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserApp\AboutResource;
use App\Http\Resources\UserApp\PaginationCollection;
use App\Models\About;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request)
    {
        try {
            return $this->success_response_with_pagination([
                'description_Mission_Statement' => strip_tags(setting('description_Mission_Statement', app()->getLocale())),
                'description_Vision' => strip_tags(setting('description_Vision', app()->getLocale())),
                'description_What_We_Offer' => strip_tags(setting('description_What_We_Offer', app()->getLocale())),
                'description_Values' => strip_tags(setting('description_Values', app()->getLocale())),
            ]);
        } catch (\Exception $e) {
            return $this->error_response('Some Error Happened', 500);
        }
    }

}
