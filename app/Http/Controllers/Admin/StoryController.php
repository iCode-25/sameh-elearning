<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Story\StoryRequest;
use App\Models\Story;
use App\Models\Level;
use App\Models\Tag;
use App\Services\StoryService;
use App\ViewModels\StoryViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class StoryController extends Controller
{
    private $story;

    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:story.view_all'], ['only' => ['index']]);
        $this->middleware(['auth:admin', 'permission:story.view_details'], ['only' => ['show']]);
        $this->middleware(['auth:admin', 'permission:story.create'], ['only' => ['create', 'update']]);
        $this->middleware(['auth:admin', 'permission:story.edit'], ['only' => ['edit', 'store']]);
        $this->middleware(['auth:admin', 'permission:story.delete'], ['only' => ['destroy']]);
        $this->middleware(['auth:admin', 'permission:story.sort'], ['only' => ['reorder', 'saveReorder']]);
        $this->story = new StoryService();
    }

    public function index(Request $request): View
    {
        return view('admin.pages.story.index');
    }


    public function table(DataTables $dataTables, Request $request)
    {
        // $model = Story::with('categories')->ordered();
        $model = Story::ordered();
        // if ($request->has('search') && !empty($request->search['value'])) {
        //     $search = $request->search['value'];
        //     $model = $model->where('name', 'LIKE', '%' . $search . '%'); // البحث فقط في اسم المدونة
        // }

        return $dataTables->eloquent($model)->addIndexColumn()
         ->filter(
                function ($query) use ($request) {
                    if ($search = $request->get('search')['value']) { // البحث باستخدام الاسم
                        $query->where(function ($q) use ($search) {
                            $q->where('name', 'LIKE', "%$search%");
                        });
                    }
                }
            )
            ->editColumn('id', function (Story $story) {
                return $story->id ?? '-';
            })->editColumn('name', function (Story $story) {
                return $story->name;
            })->editColumn('category', function (Story $story) {
                return $story->categories->name ?? '-'; // عرض اسم القسم
            })->editColumn('image', function (Story $story) {
                $imageUrl = $story->getFirstMediaUrl('story_image') ?: asset('path/to/default/image.jpg');
                return "<img width='100' src='{$imageUrl}' alt='Story Image'/>";
            })->editColumn('created_at', function (Story $story) {
                return $story->created_at->format('d-m-Y h:i A') ?? '-';
            })->addColumn('action', function (Story $story) {
                return view('admin.pages.story.buttons', compact('story'));
            })
            ->rawColumns(['image', 'action'])
            ->startsWithSearch()
            ->make(true);
    }


    /**
     * Display a Single Row of the resource.
     */
    public function Show($id): View
    {
        $story = Story::with('categories')->find($id);
        return view('admin.pages.story.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new story.
     */
    public function create(): View
    {
        $tags = Tag::get();
        return view('admin.pages.story.form',  new StoryViewModel(), get_defined_vars());
    }

    public function store(StoryRequest $request)
    {
        // return $request;
        $this->story->createStory($request->validated());
        session()->flash('success', TranslationHelper::translate('Operation Success'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Story $story): View
    {
        $tags = Tag::get();

        return view('admin.pages.story.form',  new StoryViewModel($story), get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoryRequest $request, Story $story): RedirectResponse
    {
        //        return $request;
        $this->story->updateStory($story, $request->validated());
        session()->flash('success', TranslationHelper::translate('Successfully Updated'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Story $story): JsonResponse
    {
        $this->story->deleteStory($story);
        return response()->json(['status' => 'success', 'message' => TranslationHelper::translate('Successfully Deleted')]);
    }


    public function reorder(Story $story)
    {
        return $this->story->reorder($story, 'name', 'admin.pages.story.reorder', 1);
    }

    public function saveReorder(Request $request, Story $story)
    {
        $all_entries = $request->input('tree');
        return $this->story->saveReorder($all_entries, $story);
    }

}
