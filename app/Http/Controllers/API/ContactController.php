<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserApp\BannerResource;
use App\Http\Resources\UserApp\ContactResource;
use App\Http\Resources\UserApp\PaginationCollection;
use App\Http\Resources\UserApp\PrivacypolicyResource;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Privacypolicy;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class ContactController extends Controller
{


    use ApiResponseTrait;
    public function index(Request $request)
    {
        try {
            $Contact = Contact::paginate($request->limit ?? 15);
            $data = ContactResource::collection($Contact);
            $pagination = new PaginationCollection($Contact);
            return $this->success_response_with_pagination($data, 'Contact List', $pagination);
        } catch (\Exception $e) {
            return $this->error_response('Some Error Happened', 500);
        }
    }
    
 
}
