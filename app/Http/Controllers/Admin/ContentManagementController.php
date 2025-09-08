<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContentManagement\ContentManagementRequest;
use App\Models\ContentManagement;
use App\Models\Level;
use App\Models\Tag;
use App\Services\ContentManagementService;
use App\ViewModels\ContentManagementViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;
class ContentManagementController extends Controller
{
    private $contentManagement;

    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:contentManagement.view_all'], ['only' => ['index']]);
        $this->middleware(['auth:admin', 'permission:contentManagement.view_details'], ['only' => ['show']]);
        $this->middleware(['auth:admin', 'permission:contentManagement.create'], ['only' => ['create', 'update']]);
        $this->middleware(['auth:admin', 'permission:contentManagement.edit'], ['only' => ['edit', 'store']]);
        $this->middleware(['auth:admin', 'permission:contentManagement.delete'], ['only' => ['destroy']]);
        $this->middleware(['auth:admin', 'permission:contentManagement.sort'], ['only' => ['reorder', 'saveReorder']]);
        $this->contentManagement = new ContentManagementService();
    }

    /**
     * Display a listing of the contentManagement.
     */
    public function index(Request $request): View
    {
        return view('admin.pages.contentManagement.index');
    }

    public function table(DataTables $dataTables, Request $request)
    {
        $model = ContentManagement::ordered();
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
            ->editColumn('id', function (ContentManagement $contentManagement) {
                return $contentManagement->id ?? '-';
            })->editColumn('name', function (ContentManagement $contentManagement) {
                return $contentManagement->name;
            })->editColumn('category', function (ContentManagement $contentManagement) {
                return $contentManagement->categories->name ?? '-'; // عرض اسم القسم
            })->editColumn('image', function (ContentManagement $contentManagement) {
                $imageUrl = $contentManagement->getFirstMediaUrl('content_management_image') ?: asset('path/to/default/image.jpg');
                return "<img width='100' src='{$imageUrl}' alt='ContentManagement Image'/>";
            })->editColumn('created_at', function (ContentManagement $contentManagement) {
                return $contentManagement->created_at->format('d-m-Y h:i A') ?? '-';
            })->addColumn('action', function (ContentManagement $contentManagement) {
                return view('admin.pages.contentManagement.buttons', compact('contentManagement'));
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
        $contentManagement = ContentManagement::with('categories')->find($id);
        return view('admin.pages.contentManagement.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new contentManagement.
     */
    public function create(): View
    {
        // $tags = Tag::get();
        return view('admin.pages.contentManagement.form',  new ContentManagementViewModel(), get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContentManagementRequest $request)
    {
        // return $request;
        $this->contentManagement->createContentManagement($request->validated());
        session()->flash('success', TranslationHelper::translate('Operation Success'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContentManagement $contentManagement): View
    {
        // $tags = Tag::get();
        return view('admin.pages.contentManagement.form',  new ContentManagementViewModel($contentManagement), get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContentManagementRequest $request, ContentManagement $contentManagement): RedirectResponse
    {
        //        return $request;
        $this->contentManagement->updateContentManagement($contentManagement, $request->validated());
        session()->flash('success', TranslationHelper::translate('Successfully Updated'));
        return back();
    }


    public function destroy(ContentManagement $contentManagement): JsonResponse
    {
        $this->contentManagement->deleteContentManagement($contentManagement);
        return response()->json(['status' => 'success', 'message' => TranslationHelper::translate('Successfully Deleted')]);
    }


    public function reorder(ContentManagement $contentManagement)
    {
        return $this->contentManagement->reorder($contentManagement, 'name', 'admin.pages.contentManagement.reorder', 1);
    }

    public function saveReorder(Request $request, ContentManagement $contentManagement)
    {
        $all_entries = $request->input('tree');
        return $this->contentManagement->saveReorder($all_entries, $contentManagement);
    }

}
