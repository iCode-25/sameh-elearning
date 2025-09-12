<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\BlogRequest;
use App\Models\Blog;
use App\Models\Level;
use App\Models\Tag;
use App\Services\BlogService;
use App\ViewModels\BlogViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    private $blog;

    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:blogs.view_all'], ['only' => ['index']]);
        $this->middleware(['auth:admin', 'permission:blogs.view_details'], ['only' => ['show']]);
        $this->middleware(['auth:admin', 'permission:blogs.create'], ['only' => ['create', 'update']]);
        $this->middleware(['auth:admin', 'permission:blogs.edit'], ['only' => ['edit', 'store']]);
        $this->middleware(['auth:admin', 'permission:blogs.delete'], ['only' => ['destroy']]);
        $this->middleware(['auth:admin', 'permission:blogs.sort'], ['only' => ['reorder', 'saveReorder']]);
        $this->blog = new BlogService();
    }

    /**
     * Display a listing of the blog.
     */
    public function index(Request $request): View
    {
        return view('admin.pages.blog.index');
    }


    public function table(DataTables $dataTables, Request $request)
    {
        // $model = Blog::with('categories')->ordered();
        $model = Blog::ordered();
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
            ->editColumn('id', function (Blog $blog) {
                return $blog->id ?? '-';
            })->editColumn('name', function (Blog $blog) {
                return $blog->name;
            })->editColumn('category', function (Blog $blog) {
                return $blog->categories->name ?? '-'; // عرض اسم القسم
            })->editColumn('image', function (Blog $blog) {
                $imageUrl = $blog->getFirstMediaUrl('blogs_image') ?: asset('path/to/default/image.jpg');
                return "<img width='100' src='{$imageUrl}' alt='Blog Image'/>";
            })->editColumn('created_at', function (Blog $blog) {
                return $blog->created_at->format('d-m-Y h:i A') ?? '-';
            })->addColumn('action', function (Blog $blog) {
                return view('admin.pages.blog.buttons', compact('blog'));
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

        $blog = Blog::with('categories')->find($id);
        return view('admin.pages.blog.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create(): View
    {
        return view('admin.pages.blog.form',  new BlogViewModel(), get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        // return $request;
        $this->blog->createBlog($request->validated());
        session()->flash('success', TranslationHelper::translate('Operation Success'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog): View
    {

        return view('admin.pages.blog.form',  new BlogViewModel($blog), get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog): RedirectResponse
    {
        //        return $request;
        $this->blog->updateBlog($blog, $request->validated());
        session()->flash('success', TranslationHelper::translate('Successfully Updated'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog): JsonResponse
    {
        $this->blog->deleteBlog($blog);
        return response()->json(['status' => 'success', 'message' => TranslationHelper::translate('Successfully Deleted')]);
    }


    public function reorder(Blog $blog)
    {
        return $this->blog->reorder($blog, 'name', 'admin.pages.blog.reorder', 1);
    }

    public function saveReorder(Request $request, Blog $blog)
    {
        $all_entries = $request->input('tree');
        return $this->blog->saveReorder($all_entries, $blog);
    }

}
