<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Test\TestRequest;
use App\Models\Test;
use App\Models\Level;
use App\Models\Packages;
use App\Models\Quizze;
use App\Models\Tag;
use App\Models\Videos;
use App\Services\TestService;
use App\ViewModels\QuizzeViewModel;
use App\ViewModels\TestViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class TestController extends Controller
{
    private $test;

    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:test.view_all'], ['only' => ['index']]);
        $this->middleware(['auth:admin', 'permission:test.view_details'], ['only' => ['show']]);
        $this->middleware(['auth:admin', 'permission:test.create'], ['only' => ['create', 'update']]);
        $this->middleware(['auth:admin', 'permission:test.edit'], ['only' => ['edit', 'store']]);
        $this->middleware(['auth:admin', 'permission:test.delete'], ['only' => ['destroy']]);
        $this->middleware(['auth:admin', 'permission:test.sort'], ['only' => ['reorder', 'saveReorder']]);
        $this->test = new TestService();
    }


    /**
     * Display a listing of the test.
     */
    public function index(Request $request): View
    {
        return view('admin.pages.test.index');
    }


    public function table(DataTables $dataTables, Request $request)
    {
        // $model = Test::with(['package', 'video'])->ordered();
        $model = Test::with(['package', 'video'])->withCount('quizzes')->ordered();
        return $dataTables->eloquent($model)->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($search = $request->get('search')['value']) {
                    $query->where(function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%$search%");
                    });
                }
            })
            ->editColumn('id', function (Test $test) {
                return $test->id ?? '-';
            })
            ->editColumn('name', function (Test $test) {
                return $test->name;
            })
            ->addColumn('total_quizzes', function (Test $test) {
                return $test->quizzes_count ?? 0;
            })
            ->editColumn('number_student_questions', function (Test $test) {
                return $test->number_student_questions;
            })
            ->editColumn('type', function (Test $test) {
                return $test->type ?? '-';
            })
            ->editColumn('video', function (Test $test) {
                return $test->video->name ?? '-';
            })
            ->editColumn('package', function (Test $test) {
                return $test->package->name ?? '-';
            })
            ->editColumn('category', function (Test $test) {
                return $test->categories->name ?? '-';
            })
            ->editColumn('image', function (Test $test) {
                $imageUrl = $test->getFirstMediaUrl('tests_image') ?: asset('path/to/default/image.jpg');
                return "<img width='100' src='{$imageUrl}' alt='Test Image'/>";
            })
            ->editColumn('created_at', function (Test $test) {
                return $test->created_at->format('d-m-Y') ?? '-';
            })


            ->addColumn('is_active', function ($test) {
                $checked = $test->is_active ? 'checked' : '';
                return '
        <label class="switch">
            <input type="checkbox" class="toggle-active" data-id="' . $test->id . '" ' . $checked . '>
            <span class="slider round"></span>
        </label>
    ';
            })



            ->addColumn('action', function (Test $test) {
                return view('admin.pages.test.buttons', compact('test'));
            })
            ->rawColumns(['image', 'action', 'is_active'])
            ->startsWithSearch()
            ->make(true);
    }



    public function toggleActiveStatus(Request $request)
    {
        $test = Test::findOrFail($request->id);

        if (!$test->is_active) {
            // $days = $request->input('days', 3);
            $test->is_active = true;
            // $test->active_until = now()->addDays($days);
        } else {
            $test->is_active = false;
            // $test->active_until = null;
        }
        $test->save();
        return response()->json([
            'success' => true,
            'is_active' => $test->is_active,
            // 'active_until' => $test->active_until
        ]);
    }



    // public function table(DataTables $dataTables, Request $request)
    // {
    //     $model = Test::ordered();

    //     return $dataTables->eloquent($model)->addIndexColumn()
    //         ->filter(
    //             function ($query) use ($request) {
    //                 if ($search = $request->get('search')['value']) {
    //                     $query->where(function ($q) use ($search) {
    //                         $q->where('name', 'LIKE', "%$search%");
    //                     });
    //                 }
    //             }
    //         )
    //         ->editColumn('id', function (Test $test) {
    //             return $test->id ?? '-';
    //         })->editColumn('name', function (Test $test) {
    //             return $test->name;
    //         })->editColumn('category', function (Test $test) {
    //             return $test->categories->name ?? '-';
    //         })->editColumn('image', function (Test $test) {
    //             $imageUrl = $test->getFirstMediaUrl('tests_image') ?: asset('path/to/default/image.jpg');
    //             return "<img width='100' src='{$imageUrl}' alt='Test Image'/>";
    //         })->editColumn('created_at', function (Test $test) {
    //             return $test->created_at->format('d-m-Y h:i A') ?? '-';
    //         })->addColumn('action', function (Test $test) {
    //             return view('admin.pages.test.buttons', compact('test'));
    //         })
    //         ->rawColumns(['image', 'action'])
    //         ->startsWithSearch()
    //         ->make(true);
    // }


    /**
     * Display a Single Row of the resource.
     */
    public function Show($id): View
    {
        $test = Test::with(['video', 'package'])->findOrFail($id);
        return view('admin.pages.test.show', compact('test'));
    }

    /**
     * Show the form for creating a new test.
     */
    public function create(): View
    {
        $packages = Packages::get();
        $videos = Videos::get();
        return view('admin.pages.test.form', new TestViewModel(), get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestRequest $request)
    {
        // return $request;
        $this->test->createTest($request->validated());
        session()->flash('success', TranslationHelper::translate('Operation Success'));
        return back();
    }

    public function edit(Test $test): View
    {
        $packages = Packages::get();
        $videos = Videos::get();
        return view('admin.pages.test.form', new TestViewModel($test), get_defined_vars());
    }

    public function update(TestRequest $request, Test $test): RedirectResponse
    {
        //        return $request;
        $this->test->updateTest($test, $request->validated());
        session()->flash('success', TranslationHelper::translate('Successfully Updated'));
        return back();
    }

    public function createQuizzes($id): View
    {
        $test = Test::findOrFail($id);
        return view('admin.pages.test.form_test', new QuizzeViewModel($test), get_defined_vars());
    }

    public function storeQuizzes(Request $request, Test $test)
    {
        $request->validate([
            'title' => 'required|array',
            'title.*' => 'required|string',

            'answer_1' => 'required|array',
            'answer_1.*' => 'required|string',

            'answer_2' => 'required|array',
            'answer_2.*' => 'required|string',

            'answer_3' => 'nullable|array',
            'answer_3.*' => 'nullable|string',

            'answer_4' => 'nullable|array',
            'answer_4.*' => 'nullable|string',
            // 'image_answer_1' => 'required|file|image',
            // 'image_answer_2' => 'required|file|image',
            // 'image_answer_3' => 'nullable|file|image',
            'c_answer' => 'required|string|in:answer_1,answer_2,answer_3,answer_4',
            'question_score' => 'required',
            'hint' => 'nullable|string',
        ]);

        $quiz = Quizze::create([
            'title' => $request->title,
            'answer_1' => $request->answer_1,
            'answer_2' => $request->answer_2,
            'answer_3' => $request->answer_3,
            'answer_4' => $request->answer_4,
            'c_answer' => $request->c_answer,
            'question_score' => $request->question_score,
            'hint' => $request->hint,
            'test_id' => $test->id,
        ]);
        // $this->storeAnswerImages($quiz, $request);
        session()->flash('success', TranslationHelper::translate('Operation Success'));
        return back();
    }

    private function storeAnswerImages(Quizze $quiz, Request $request)
    {
        foreach (range(1, 3) as $answerIndex) {
            $field = "image_answer_{$answerIndex}";
            if ($request->hasFile($field)) {
                $quiz->clearMediaCollection("answer_{$answerIndex}_image");
                $quiz->storeFile($request->file($field), "answer_{$answerIndex}_image");
            }
        }
    }

    public function showAnswers($id): View
    {
        $test = Test::with('quizzes')->findOrFail($id);
        return view('admin.pages.test.show_answers', compact('test'));
    }

    public function editQuizzes($id): View
    {
        $quizze = Quizze::findOrFail($id);
        $test = $quizze->tests;
        return view('admin.pages.test.form_test', new QuizzeViewModel($test, $quizze), get_defined_vars());
    }

    public function updateQuizzes(Request $request, $id)
    {
        $quiz = Quizze::findOrFail($id);

        $request->validate([
            'title' => 'required|array',
            'answer_1' => 'required|array',
            'answer_2' => 'required|array',
            'answer_3' => 'nullable|array',
            'answer_4' => 'nullable|array',
            'hint' => 'nullable|string',

            'c_answer' => 'required|string|in:answer_1,answer_2,answer_3,answer_4',
            'question_score' => 'required',
            'image_answer_1' => 'nullable|file|image',
            'image_answer_2' => 'nullable|file|image',
            'image_answer_3' => 'nullable|file|image',
        ]);

        foreach (config('language') as $lang => $label) {
            $quiz->setTranslation('title', $lang, $request->title[$lang]);
            $quiz->setTranslation('answer_1', $lang, $request->answer_1[$lang]);
            $quiz->setTranslation('answer_2', $lang, $request->answer_2[$lang]);
            $quiz->setTranslation('answer_3', $lang, $request->answer_3[$lang] ?? null);
            $quiz->setTranslation('answer_4', $lang, $request->answer_4[$lang] ?? null);

        }
        $quiz->c_answer = $request->c_answer;
        $quiz->question_score = $request->question_score;
        $quiz->hint = $request->hint;
        $quiz->save();
        foreach (range(1, 3) as $index) {
            if ($request->hasFile("image_answer_{$index}")) {
                $quiz->clearMediaCollection("answer_{$index}_image");
                $quiz->storeFile($request->file("image_answer_{$index}"), "answer_{$index}_image");
            }
        }
        session()->flash('success', TranslationHelper::translate('Update successful'));
        return back();
    }



    public function destroyQuizzes(Quizze $quizze): JsonResponse
    {
        $quizze->delete();
        return response()->json(['status' => 'success', 'message' => TranslationHelper::translate('Successfully Deleted')]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test): JsonResponse
    {
        $this->test->deleteTest($test);
        return response()->json(['status' => 'success', 'message' => TranslationHelper::translate('Successfully Deleted')]);
    }


    public function reorder(Test $test)
    {
        return $this->test->reorder($test, 'name', 'admin.pages.test.reorder', 1);
    }

    public function saveReorder(Request $request, Test $test)
    {
        $all_entries = $request->input('tree');
        return $this->test->saveReorder($all_entries, $test);
    }
}
