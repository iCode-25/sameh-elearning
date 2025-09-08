<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserApp\BannerResource;
use App\Http\Resources\UserApp\WorkshopsResource;
use App\Http\Resources\UserApp\PaginationCollection;
use App\Http\Resources\UserApp\PrivacypolicyResource;
use App\Http\Resources\UserApp\TestResource;
use App\Models\Answer;
use App\Models\Banner;
use App\Models\Workshops;
use App\Models\Privacypolicy;
use App\Models\Quizze;
use App\Models\RegistrationWorkshops;
use App\Models\Test;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class AnsweringQuestionsController extends Controller
{
    use ApiResponseTrait;


    public function Answering_questions(Request $request)
    {
        $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'user_answer' => 'required|string',
            'client_id' => 'nullable|exists:clients,id', // جعل client_id اختياريًا
        ]);

        // جلب السؤال أو إرجاع خطأ إذا لم يكن موجودًا
        $quiz = Quizze::findOrFail($request->quiz_id);

        // مقارنة الإجابة المدخلة بالإجابة الصحيحة
        $isCorrect = strcasecmp(trim($request->user_answer), trim($quiz->c_answer)) === 0;

        // إنشاء الإجابة مع التحقق من وجود client_id قبل إضافته
        $answerData = [
            'quiz_id' => $request->quiz_id,
            'user_answer' => $request->user_answer,
            'is_correct' => $isCorrect,
        ];

        if ($request->filled('client_id')) {
            $answerData['client_id'] = $request->client_id;
        }

        $answer = Answer::create($answerData);

        // إرسال الاستجابة
        if ($isCorrect) {
            return $this->success_response($answer, 'إجابة صحيحة ✅');
        } else {
            return $this->error_response('إجابة خاطئة ❌', 200);
        }
    }


    // public function index(Request $request)
    // {
    //     try {
    //         $tests = Test::with('quizzes')->paginate($request->limit ?? 15); // جلب الاختبارات مع الأسئلة المرتبطة بها
    //         $data = TestResource::collection($tests);
    //         $pagination = new PaginationCollection($tests);
    //         return $this->success_response_with_pagination($data, 'Test List', $pagination);
    //     } catch (\Exception $e) {
    //         return $this->error_response('Some Error Happened', 500);
    //     }
    // }

    

    
 
}
