<?php

namespace App\Http\Controllers\Admin;
use App\Models\Videos;
use App\Models\Packages;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Services\PackagesService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Packages\PackageLessonsRequest;

class PackageLessonsController extends Controller
{
    private $packages;
    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:packages.view_all'], ['only' => ['index']]);
        $this->middleware(['auth:admin', 'permission:packages.view_details'], ['only' => ['show']]);
        $this->middleware(['auth:admin', 'permission:packages.create'], ['only' => ['create', 'update']]);
        $this->middleware(['auth:admin', 'permission:packages.edit'], ['only' => ['edit', 'store']]);
        $this->middleware(['auth:admin', 'permission:packages.delete'], ['only' => ['destroy']]);
        $this->packages = new PackagesService();
    }



    public function index(Request $request, Packages $packages): View
    {
        // dd($request);
        $lessons = Videos::get();
        $package = $packages;
        $package_lessons = $packages->lessons()->get();
        return view('admin.pages.packages.show_package_lessons', get_defined_vars());
    }



    public function table(DataTables $dataTables, Request $request, Packages $packages)
    {
        $model = $packages->lessons()->with(['media', 'level'])->select('news.*');

        return $dataTables->eloquent($model)
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
            ->editColumn('price', function (Videos $videos) {
                return $videos->price;
            })
            ->editColumn('image', function (Videos $videos) {
                $imageUrl = $videos->getFirstMediaUrl('newsimage_news') ?: asset('path/to/default/image.jpg');
                return "<img width='100' src='{$imageUrl}' alt='Image'/>";
            })
            ->editColumn('created_at', function (Videos $videos) {
                return $videos->created_at ? $videos->created_at->format('d-m-Y') : '-';
            })
            ->addColumn('action', function (Videos $videos) use ($packages) {
                return view('admin.pages.packages.lessons_buttons', compact('videos', 'packages'))->render();
            })
            ->addColumn('is_active', function (Videos $videos) {
                return $videos->is_active
                    ? '<label class="switch"><input type="checkbox" class="active-toggle" data-id="' . $videos->id . '" checked><span class="slider round"></span></label>'
                    : '<label class="switch"><input type="checkbox" class="active-toggle" data-id="' . $videos->id . '"><span class="slider round"></span></label>';
            })
            ->rawColumns(['index', 'image', 'is_active', 'action'])
            ->startsWithSearch()
            ->make(true);
    }



    public function showPackageLessons($id): View
    {
        $lessons = Videos::get();
        $package = Packages::findOrFail($id);
        $package_lessons = $package->lessons()->get();
        return view('admin.pages.packages.show_package_lessons', get_defined_vars());
    }



    public function attachToPackage(PackageLessonsRequest $request, Packages $packages)
    {
        $packages->lessons()->syncWithoutDetaching($request->lessons);
        return redirect()->back()->with('success', 'تم ربط الدروس بالباكدج بنجاح.');
    }


    public function removeFromPackage(Packages $packages, Videos $lesson)
    {
        $packages->lessons()->detach($lesson);
        return redirect()->back()->with('success', 'تم حذف الدرس بالباكدج بنجاح.');
    }


}
