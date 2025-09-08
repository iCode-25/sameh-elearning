<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserApp\ClientResource;
use App\Models\Client;
use App\Models\Otp;
use App\Models\Pointssetting;
// use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponseTrait;
use App\Traits\HandleUploadFile;
// use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    use ApiResponseTrait, HandleUploadFile;


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required|min:6',
        ]);

        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $client->createToken('estedama')->accessToken;
        $data = (new ClientResource($client))->toArray($request);
        $data['token'] = $token;

        return $this->success_response($data, 'تم إنشاء الحساب بنجاح.');
    }




    public function updateMyProfile(Request $request)
    {
        try {
            $client = auth('client_api')->user();

            $validator = Validator::make($request->all(), [
                'birth' => $client->birth ? 'nullable|string|max:255' : 'required|string|max:255',
                'gender' => $client->gender ? 'nullable|in:male,female' : 'required|in:male,female',
                'imageprofile' => 'nullable',
                'name' => 'nullable',
                'email' => 'nullable',
                'birth' => 'nullable',
                'gender' => 'nullable',
            ], [
                'birth.required' => 'تاريخ الميلاد مطلوب.',
                'gender.required' => 'الجنس مطلوب.',
                'gender.in' => 'يجب أن يكون الجنس ذكر (male) أو أنثى (female).',
               
            ]);
            if ($validator->fails()) {
                return $this->error_response($validator->errors()->first(), 422);
            }

            $client->update([
                'birth' => $request->birth,
                'gender' => $request->gender,
                'name' => $request->name,
                'email' => $request->email,
                'birth' => $request->birth,
                'gender' => $request->gender,
            ]);

            if ($request->hasFile('imageprofile')) {
                $client->clearMediaCollection('client_profile');
                $client->addMedia($request->file('imageprofile'))->toMediaCollection('client_profile');
            }

            return $this->success_response(
                new ClientResource($client),
                'تم تحديث معلومات العميل بنجاح'
            );
        } catch (\Exception $e) {
            return $this->error_response('حدث خطأ غير متوقع', 500);
        }
    }



    // public function updateMyProfile(Request $request)
    // {
    //     try {
    //         $client = auth('client_api')->user();

    //         $validator = Validator::make($request->all(), [
    //             'birth' => $client->birth ? 'nullable|string|max:255' : 'required|string|max:255',
    //             'gender' => $client->gender ? 'nullable|string|max:255' : 'required|string|max:255',
    //             'imageprofile' => 'nullable',
    //         ], [
    //             'birth.required' => 'اسم العميل مطلوب.',
    //         ]);

    //         if ($validator->fails()) {
    //             return $this->error_response($validator->errors()->first(), 422);
    //         }

    //         $client->update([
    //             'birth' => $request->birth,
    //             'gender' => $request->gender,
    //         ]);

    //         if ($request->hasFile('imageprofile')) {
    //             $client->clearMediaCollection('client_profile'); 
    //             $client->addMedia($request->file('imageprofile'))->toMediaCollection('client_profile');
    //         }
           
    //         return $this->success_response(
    //             new ClientResource($client),
    //             'تم تحديث معلومات العميل بنجاح'
    //         );
    //     } catch (\Exception $e) {
    //         return $this->error_response('حدث خطأ غير متوقع', 500);
    //     }
    // }

    public function getMyProfile() {
        $client = auth('client_api')->user();
        $data = new ClientResource($client);
        return $this->success_response($data, 'My Profile');
    }

    public function updateImage(Request $request)
    {
         $client = auth('client_api')->user();
        if ($request->hasFile('imageprofile')) {
            $client->clearMediaCollection('client_profile');
            $client->addMedia($request->file('imageprofile'))->toMediaCollection('client_profile');
        }
        return $this->success_response([], 'تم التحديث بنجاح');
    }
    public function updateFcmToken(Request $request)
    {
        $client = auth('client_api')->user();
        if (!$client) {
            return $this->error_response('User not authenticated', 401);
        }
        $client->fcm_token = $request->fcm_token;
        $client->save();
        return $this->success_response([], 'Token updated successfully.');
    }
    
    public function clientPoints(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'points' => 'required|numeric|min:1',
        ]);
        $client = Client::find($request->client_id);
        $client->points += $request->points;
        $client->save();
        return $this->success_response([], 'updated successfully.');
    }


    // public function updateMyProfile(Request $request)
    // {
    //     try {
    //         $client = auth('client_api')->user(); 

    //         $validator = Validator::make($request->all(), [
    //             'name' => $client->name ? 'nullable|string|max:255' : 'required|string|max:255',
    //             'city_id' => $client->city_id ? 'nullable|exists:cities,id' : 'required|exists:cities,id',
    //             'card' => [
    //                 $client->card ? 'nullable' : 'required',
    //                 'digits_between:1,14',
    //                 Rule::unique('clients', 'card')->ignore($client->id),
    //             ],
    //             'image' => $client->getMedia('clients')->count() ? 'nullable' : 'required',
    //             // 'imageprofile' => $client->getMedia('clients_profile')->count() ? 'nullable' : 'required',
    //             'imageprofile' => 'nullable',
    //             'paintscategories' => $client->paintscategories->isNotEmpty() ? 'nullable|array' : 'required|array',
    //             'paintscategories.*' => 'exists:paints_category,id',
    //         ], [
    //             'name.required' => 'اسم العميل مطلوب.',
    //             'name.string' => 'يجب أن يكون الاسم نصًا.',
    //             'city_id.required' => 'المدينة مطلوبة.',
    //             'card.required' => 'رقم البطاقة مطلوب.',
    //             'card.digits_between' => 'يجب أن يكون رقم البطاقة مكونًا من 1 إلى 14 رقمًا فقط.',
    //             'card.unique' => 'رقم البطاقة تم استخدامه من قبل.',
    //             'image.required' => 'صورة العميل مطلوبة.',
    //             'image.file' => 'يجب أن يكون الملف صورة صالحة.',
    //             'image.image' => 'يجب أن يكون الملف صورة (jpg, png, ...).',
    //             'image.max' => 'يجب ألا يزيد حجم الصورة عن 2 ميجا بايت.',
    //             'paintscategories.required' => 'يجب اختيار الفئات الخاصة بالدهانات.',
    //             'paintscategories.array' => 'يجب أن تكون الفئات عبارة عن مصفوفة.',
    //             'paintscategories.*.exists' => 'الفئة المحددة غير موجودة.',
    //         ]);

    //         if ($validator->fails()) {
    //             return $this->error_response($validator->errors()->first(), 422);
    //         }

    //         $client->update([
    //             'name' => $request->name,
    //             'city_id' => $request->city_id,
    //             'card' => $request->card,
    //         ]);

    //         if ($request->hasFile('image')) {
    //             $client->clearMediaCollection('clients');
    //             $client->addMedia($request->file('image'))->toMediaCollection('clients');
    //         }

    //         if ($request->hasFile('imageprofile')) {
    //             $client->clearMediaCollection('clients_profile');
    //             $client->addMedia($request->file('imageprofile'))->toMediaCollection('clients_profile');
    //         }

    //         $client->paintscategories()->sync($request->paintscategories);

    //         return $this->success_response(
    //             new ClientResource($client),
    //             'تم تحديث معلومات العميل بنجاح'
    //         );
    //     } catch (\Exception $e) {
    //         return $this->error_response('حدث خطأ غير متوقع', 500);
    //     }
    // }

    // public function updateMyProfile(Request $request)
    // {
    //     try {
    //         $client = auth('client_api')->user();

    //         $validator = Validator::make($request->all(), [
    //             'name' => $client->name ? 'nullable|string|max:255' : 'required|string|max:255',
    //             'city_id' => $client->city_id ? 'nullable|exists:cities,id' : 'required|exists:cities,id',
    //             'card' => [
    //                 $client->card ? 'nullable' : 'required',
    //                 'digits_between:1,14',
    //                 Rule::unique('clients', 'card')->ignore($client->id),
    //             ],
    //             'image' => $client->getMedia('clients')->count() ? 'nullable' : 'required',
    //             'imageprofile' => 'nullable',
    //             'paintscategories' => $client->paintscategories->isNotEmpty() ? 'nullable|array' : 'required|array',
    //             'paintscategories.*' => 'exists:paints_category,id',
    //         ], [
    //             'name.required' => 'اسم العميل مطلوب.',
    //             'city_id.required' => 'المدينة مطلوبة.',
    //             'card.required' => 'رقم البطاقة مطلوب.',
    //             'card.digits_between' => 'يجب أن يكون رقم البطاقة مكونًا من 1 إلى 14 رقمًا فقط.',
    //             'card.unique' => 'رقم البطاقة تم استخدامه من قبل.',
    //             'image.required' => 'صورة العميل مطلوبة.',
    //             'paintscategories.required' => 'يجب اختيار الفئات الخاصة بالدهانات.',
    //         ]);

    //         if ($validator->fails()) {
    //             return $this->error_response($validator->errors()->first(), 422);
    //         }

    //         // تحديث بيانات العميل
    //         $client->update([
    //             'name' => $request->name,
    //             'city_id' => $request->city_id,
    //             'card' => $request->card,

    //             // code_for_client
    //         ]);

    //         // تحديث الصور إذا وجدت
    //         if ($request->hasFile('image')) {
    //             $client->clearMediaCollection('clients');
    //             $client->addMedia($request->file('image'))->toMediaCollection('clients');
    //         }

    //         if ($request->hasFile('imageprofile')) {
    //             $client->clearMediaCollection('clients_profile');
    //             $client->addMedia($request->file('imageprofile'))->toMediaCollection('clients_profile');
    //         }

    //         $client->paintscategories()->sync($request->paintscategories);

    //         return $this->success_response(
    //             new ClientResource($client),
    //             'تم تحديث معلومات العميل بنجاح'
    //         );
    //     } catch (\Exception $e) {
    //         return $this->error_response('حدث خطأ غير متوقع', 500);
    //     }
    // }







    // public function updateMyProfile(Request $request)
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'name' => 'required|string|max:255',
    //             'city_id' => 'required|exists:cities,id',
    //             'card' => [
    //                 $request->isMethod('post') ? 'required' : 'nullable', 
    //                 'digits_between:1,14',
    //                 Rule::unique('clients', 'card')->ignore(auth('client_api')->user()->id),
    //             ],
    //             'image' => 'required',
    //             'imageprofile' => 'nullable',
    //             'paintscategories' => 'required|array',
    //             'paintscategories.*' => 'exists:paints_category,id',
    //         ], [
    //             'name.required' => 'اسم العميل مطلوب.',
    //             'name.string' => 'يجب أن يكون الاسم نصًا.',
    //             'city_id.required' => 'المدينة مطلوبة.',
    //             'card.required' => 'رقم البطاقة مطلوب.',
    //             'card.digits_between' => 'يجب أن يكون رقم البطاقة مكونًا من 1 إلى 14 رقمًا فقط.',
    //             'card.unique' => 'رقم البطاقة تم استخدامه من قبل.',
    //             'image.file' => 'يجب أن يكون الملف صورة صالحة.',
    //             'image.image' => 'يجب أن يكون الملف صورة (jpg, png, ...).',
    //             'image.max' => 'يجب ألا يزيد حجم الصورة عن 2 ميجا بايت.',
    //             'paintscategories.required' => 'يجب اختيار الفئات الخاصة بالدهانات.',
    //             'paintscategories.array' => 'يجب أن تكون الفئات عبارة عن مصفوفة.',
    //             'paintscategories.*.exists' => 'الفئة المحددة غير موجودة.',
    //         ]);

    //         if ($validator->fails()) {
    //             // dd($validator->errors());
    //             return $this->error_response($validator->errors()->first(), 422);
    //         }

    //         $client = auth('client_api')->user();

    //         $client->update([
    //             'name' => $request->name,
    //             'city_id' => $request->city_id,
    //             'card' => $request->card,
    //         ]);

    //         if ($request->hasFile('image')) {
    //             $client->clearMediaCollection('clients'); 
    //             $client->addMedia($request->file('image'))->toMediaCollection('clients');
    //         }

    //         if ($request->hasFile('imageprofile')) {
    //             $client->clearMediaCollection('clients_profile');
    //             $client->addMedia($request->file('imageprofile'))->toMediaCollection('clients_profile');
    //         }



    //         $client->paintscategories()->sync($request->paintscategories);

    //         // return $this->success_response ($client, 'تم تحديث معلومات العميل بنجاح');
    //         // $data = new ClientResource($client);

    //         return $this->success_response(

    //                  new ClientResource($client),
    //             'تم تحديث معلومات العميل بنجاح'
    //         );
    //     } catch (\Exception $e) {
    //         return $this->error_response('حدث خطأ غير متوقع', 500);
    //     }
    // }
    // public function updateMyProfile(Request $request)
    // {
    //     try {
    //         $client = auth('client_api')->user(); // العميل الحالي

    //         $validator = Validator::make($request->all(), [
    //             'name' => 'required|string|max:255',
    //             'city_id' => 'required|exists:cities,id',
    //             'card' => [
    //                 $client->card ? 'nullable' : 'required', // إذا كان لديه بطاقة بالفعل، اجعلها اختيارية
    //                 'digits_between:1,14',
    //                 Rule::unique('clients', 'card')->ignore($client->id), 
    //             ],
    //             'image' => 'required',
    //             'imageprofile' => 'nullable',
    //             'paintscategories' => 'required|array',
    //             'paintscategories.*' => 'exists:paints_category,id',
    //         ], [
    //             'name.required' => 'اسم العميل مطلوب.',
    //             'name.string' => 'يجب أن يكون الاسم نصًا.',
    //             'city_id.required' => 'المدينة مطلوبة.',
    //             'card.required' => 'رقم البطاقة مطلوب.',
    //             'card.digits_between' => 'يجب أن يكون رقم البطاقة مكونًا من 1 إلى 14 رقمًا فقط.',
    //             'card.unique' => 'رقم البطاقة تم استخدامه من قبل.',
    //             'image.file' => 'يجب أن يكون الملف صورة صالحة.',
    //             'image.image' => 'يجب أن يكون الملف صورة (jpg, png, ...).',
    //             'image.max' => 'يجب ألا يزيد حجم الصورة عن 2 ميجا بايت.',
    //             'paintscategories.required' => 'يجب اختيار الفئات الخاصة بالدهانات.',
    //             'paintscategories.array' => 'يجب أن تكون الفئات عبارة عن مصفوفة.',
    //             'paintscategories.*.exists' => 'الفئة المحددة غير موجودة.',
    //         ]);

    //         if ($validator->fails()) {
    //             return $this->error_response($validator->errors()->first(), 422);
    //         }

    //         $client->update([
    //             'name' => $request->name,
    //             'city_id' => $request->city_id,
    //             'card' => $request->card,
    //         ]);

    //         if ($request->hasFile('image')) {
    //             $client->clearMediaCollection('clients');
    //             $client->addMedia($request->file('image'))->toMediaCollection('clients');
    //         }

    //         if ($request->hasFile('imageprofile')) {
    //             $client->clearMediaCollection('clients_profile');
    //             $client->addMedia($request->file('imageprofile'))->toMediaCollection('clients_profile');
    //         }

    //         $client->paintscategories()->sync($request->paintscategories);

    //         return $this->success_response(
    //             new ClientResource($client),
    //             'تم تحديث معلومات العميل بنجاح'
    //         );
    //     } catch (\Exception $e) {
    //         return $this->error_response('حدث خطأ غير متوقع', 500);
    //     }
    // }





}
