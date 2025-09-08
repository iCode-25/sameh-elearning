<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Challenges\ChallengesRequest;
use App\Models\Challenges;
use App\Models\Level;
use App\Models\RegistrationChallenges;
use App\Models\Tag;
use App\Services\ChallengesService;
use App\ViewModels\ChallengesViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class ChallengesController extends Controller
{
    private $challenges;
    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:challenges.view_all'], ['only' => ['index']]);
        $this->middleware(['auth:admin', 'permission:challenges.view_details'], ['only' => ['show']]);
        $this->middleware(['auth:admin', 'permission:challenges.create'], ['only' => ['create', 'update']]);
        $this->middleware(['auth:admin', 'permission:challenges.edit'], ['only' => ['edit', 'store']]);
        $this->middleware(['auth:admin', 'permission:challenges.delete'], ['only' => ['destroy']]);
        $this->middleware(['auth:admin', 'permission:challenges.sort'], ['only' => ['reorder', 'saveReorder']]);
        $this->challenges = new ChallengesService();
    }

    /**
     * Display a listing of the challenges.
     */
    public function index(Request $request): View
    {
        return view('admin.pages.challenges.index');
    }


    public function table(DataTables $dataTables, Request $request)
    {
        // $model = Challenges::with('categories')->ordered();
        $model = Challenges::ordered();
        // if ($request->has('search') && !empty($request->search['value'])) {
        //     $search = $request->search['value'];
        //     $model = $model->where('name', 'LIKE', '%' . $search . '%'); // البحث فقط في اسم المدونة
        // }

        return $dataTables->eloquent($model)->addIndexColumn()
         ->filter(
                function ($query) use ($request) {
                    if ($search = $request->get('search')['value']) {
                        $query->where(function ($q) use ($search) {
                            $q->where('name', 'LIKE', "%$search%");
                        });
                    }
                }
            )
            ->editColumn('id', function (Challenges $challenges) {
                return $challenges->id ?? '-';
            })->editColumn('name', function (Challenges $challenges) {
                return $challenges->name;
        })->editColumn('date', function (Challenges $challenges) {
            return $challenges->date;
            })->editColumn('category', function (Challenges $challenges) {
                return $challenges->categories->name ?? '-'; // عرض اسم القسم
            })->editColumn('image', function (Challenges $challenges) {
                $imageUrl = $challenges->getFirstMediaUrl('challenges_image') ?: asset('path/to/default/image.jpg');
                return "<img width='100' src='{$imageUrl}' alt='Challenges Image'/>";

            })->editColumn('created_at', function (Challenges $challenges) {
                return $challenges->created_at->format('d-m-Y h:i A') ?? '-';

        })->addColumn('is_active', function (Challenges $challenges) {
            return $challenges->is_active
                ? '<label class="switch"><input type="checkbox" class="active-toggle" data-id="' . $challenges->id . '" checked><span class="slider round"></span></label>'
                : '<label class="switch"><input type="checkbox" class="active-toggle" data-id="' . $challenges->id . '"><span class="slider round"></span></label>';

            })->addColumn('action', function (Challenges $challenges) {
                return view('admin.pages.challenges.buttons', compact('challenges'));
            })
            ->rawColumns(['image', 'action' , 'is_active'])
            ->startsWithSearch()
            ->make(true);
    }


    public function toggleActiveStatus(Request $request)
    {
        $challenges = Challenges::findOrFail($request->id);
        $challenges->is_active = !$challenges->is_active;
        $challenges->save();
        return response()->json(['success' => true, 'is_active' => $challenges->is_active]);
    }


    // public function viewRegistrationChallenges($challengesId)
    // {
    //     return view('admin.pages.challenges.viewRegistrationChallenges', compact('challengesId'));
    // }
    public function viewRegistrationChallenges($challengesId)
    {
        $challenge = Challenges::findOrFail($challengesId);
        $registrations = RegistrationChallenges::where('challenges_id', $challengesId)->get();
        return view('admin.pages.challenges.viewRegistrationChallenges', compact('challenge', 'registrations'));
    }


    /**
     * Display a Single Row of the resource.
     */
    public function Show($id): View
    {

        $challenges = Challenges::find($id);
        return view('admin.pages.challenges.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new challenges.
     */
    public function create(): View
    {
        $tags = Tag::get();
        return view('admin.pages.challenges.form',  new ChallengesViewModel(), get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChallengesRequest $request)
    {
        // return $request;
        $this->challenges->createChallenges($request->validated());
        session()->flash('success', TranslationHelper::translate('Operation Success'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Challenges $challenges): View
    {
        $tags = Tag::get();
        return view('admin.pages.challenges.form',  new ChallengesViewModel($challenges), get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChallengesRequest $request, Challenges $challenges): RedirectResponse
    {
        //        return $request;
        $this->challenges->updateChallenges($challenges, $request->validated());
        session()->flash('success', TranslationHelper::translate('Successfully Updated'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Challenges $challenges): JsonResponse
    {
        $this->challenges->deleteChallenges($challenges);
        return response()->json(['status' => 'success', 'message' => TranslationHelper::translate('Successfully Deleted')]);
    }


    public function reorder(Challenges $challenges)
    {
        return $this->challenges->reorder($challenges, 'name', 'admin.pages.challenges.reorder', 1);
    }

    public function saveReorder(Request $request, Challenges $challenges)
    {
        $all_entries = $request->input('tree');
        return $this->challenges->saveReorder($all_entries, $challenges);
    }

}
