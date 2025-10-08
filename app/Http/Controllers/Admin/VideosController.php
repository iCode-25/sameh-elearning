<?php

namespace App\Http\Controllers\Admin;

use App\Models\Videos;
use App\Models\Level;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\VideosService;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Helpers\TranslationHelper;
use App\ViewModels\VideosViewModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\Videos\VideosRequest;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class VideosController extends Controller
{
    private $videos;

    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:videos.view_all'], ['only' => ['index']]);
        $this->middleware(['auth:admin', 'permission:videos.view_details'], ['only' => ['show']]);
        $this->middleware(['auth:admin', 'permission:videos.create'], ['only' => ['create', 'store']]);
        $this->middleware(['auth:admin', 'permission:videos.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['auth:admin', 'permission:videos.delete'], ['only' => ['destroy']]);
        $this->middleware(['auth:admin', 'permission:videos.sort'], ['only' => ['reorder', 'saveReorder']]);
        $this->videos = new VideosService();
    }
    /**
     * Display a listing of the videos.
     */
    public function index(Request $request): View
    {
        // dd($request->all());
        return view('admin.pages.videos.index');
    }

    public function table(DataTables $dataTables, Request $request)
    {
        $model = Videos::with('level')->ordered();
        return $dataTables->eloquent($model)
            ->filter(function ($query) use ($request) {
                if ($request->filled('level_id')) {
                    $query->where('level_id', $request->get('level_id'));
                }
                if ($search = $request->get('search')['value']) {
                    $query->where(function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    });
                }
            })
            ->addColumn('index', function () {
                static $i = 0;
                return ++$i;
            })
            ->editColumn('id', function (Videos $videos) {
                return $videos->id ?? '-';
            })
            ->editColumn('name', function (Videos $videos) {
                return $videos->name ?? '-';
            })
            ->editColumn('level', function (Videos $videos) {
                return $videos->level->name ?? '-';
            })
            ->editColumn('newsnews_video', function (Videos $videos) {
                $videoUrl = $videos->getFirstMediaUrl('newsimage_newsnews_video');
                if ($videoUrl) {
                    return "
                    <video width='100' controls>
                        <source src='{$videoUrl}' type='video/mp4'>
                        Your browser does not support the video tag.
                    </video>
                    ";
                } else {
                    return "<span class='text-muted'>No Video</span>";
                }
            })
            ->editColumn('image', function (Videos $videos) {
                $imageUrl = $videos->getFirstMediaUrl('newsimage_news') ?: asset('path/to/default/image.jpg');
                return "<img width='100' src='{$imageUrl}' alt='Image'/>";
            })
            ->editColumn('created_at', function (Videos $videos) {
                return $videos->created_at ? $videos->created_at->format('d-m-Y') : '-';
            })
            ->addColumn('action', function (Videos $videos) {
                return view('admin.pages.videos.buttons', compact('videos'));
            })
            ->addColumn('is_active', function (Videos $videos) {
                return $videos->is_active
                    ? '<label class="switch"><input type="checkbox" class="active-toggle" data-id="' . $videos->id . '" checked><span class="slider round"></span></label>'
                    : '<label class="switch"><input type="checkbox" class="active-toggle" data-id="' . $videos->id . '"><span class="slider round"></span></label>';
            })
            ->rawColumns(['index', 'newsnews_video', 'image', 'is_active', 'action'])
            ->startsWithSearch()
            ->make(true);
    }



    public function toggleActiveStatus(Request $request)
    {
        $video = videos::findOrFail($request->id);
        $video->is_active = !$video->is_active;
        $video->save();
        return response()->json(['success' => true, 'is_active' => $video->is_active]);
    }

    public function Show($id): View
    {
        $videos = Videos::find($id);
        return view('admin.pages.videos.show', get_defined_vars());
    }


    public function create(): View
    {
        // TODO: Get Levels List
        $levels = Level::get();
        return view('admin.pages.videos.form',  new VideosViewModel(), get_defined_vars());
    }


    public function store(VideosRequest $request)
    {
        // return $request;
        $this->videos->createVideos($request->validated());
        session()->flash('success', TranslationHelper::translate('Operation Success'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videos $videos): View
    {
        $levels = Level::get();
        return view('admin.pages.videos.form',  new VideosViewModel($videos), get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideosRequest $request, Videos $videos): RedirectResponse
    {
        //        return $request;
        $this->videos->updateVideos($videos, $request->validated());
        session()->flash('success', TranslationHelper::translate('Successfully Updated'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videos $videos): JsonResponse
    {
        $this->videos->deleteVideos($videos);
        return response()->json(['status' => 'success', 'message' => TranslationHelper::translate('Successfully Deleted')]);
    }



    public function reorder(Videos $videos)
    {
        return $this->videos->reorder($videos, 'name', 'admin.pages.videos.reorder', 1);
    }

    public function saveReorder(Request $request, Videos $videos)
    {
        $all_entries = $request->input('tree');
        return $this->videos->saveReorder($all_entries, $videos);
    }

    public function attachToPackage()
    {
        //
    }
}
