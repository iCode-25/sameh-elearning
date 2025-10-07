<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Packages\PackagesRequest;
use App\Models\Packages;
use App\Models\Level;
use App\Models\RegistrationPackages;
use App\Models\Tag;
use App\Models\Videos;
use App\Services\PackagesService;
use App\ViewModels\PackagesViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class PackagesController extends Controller
{
    private $packages;
    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:packages.view_all'], ['only' => ['index']]);
        $this->middleware(['auth:admin', 'permission:packages.view_details'], ['only' => ['show']]);
        $this->middleware(['auth:admin', 'permission:packages.create'], ['only' => ['create', 'update']]);
        $this->middleware(['auth:admin', 'permission:packages.edit'], ['only' => ['edit', 'store']]);
        $this->middleware(['auth:admin', 'permission:packages.delete'], ['only' => ['destroy']]);
        $this->middleware(['auth:admin', 'permission:workshops.sort'], ['only' => ['reorder', 'saveReorder']]);
        $this->packages = new PackagesService();
    }
    public function index(Request $request): View
    {
        return view('admin.pages.packages.index');
    }


    public function table(DataTables $dataTables, Request $request)
    {
        $model = Packages::with('level')
            ->select('id', 'name', 'price', 'date', 'created_at', 'is_active', 'discount', 'level_id')
            ->ordered();
        return $dataTables->eloquent($model)->addIndexColumn()

            ->filter(function ($query) use ($request) {
                if ($search = $request->get('search')['value']) {
                    $query->where(function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%$search%");
                    });
                }
                if ($request->filled('level_id')) {
                    $query->where('level_id', $request->get('level_id'));
                }
            })
            ->editColumn('id', function (Packages $packages) {
                return $packages->id ?? '-';
            })->editColumn('name', function (Packages $packages) {
                return $packages->name;
            })->editColumn('level', function (Packages $packages) {
                return $packages->level->name ?? '-';
            })->editColumn('date', function (Packages $packages) {
                return $packages->date;
            })->editColumn('image', function (Packages $packages) {
                $imageUrl = $packages->getFirstMediaUrl('workshops_image') ?: asset('path/to/default/image.jpg');
                return "<img width='100' src='{$imageUrl}' alt='Packages Image'/>";
            })->editColumn('created_at', function (Packages $packages) {
                return $packages->created_at->format('d-m-Y h:i A') ?? '-';
            })->addColumn('is_active', function (Packages $packages) {
                return $packages->is_active
                    ? '<label class="switch"><input type="checkbox" class="active-toggle" data-id="' . $packages->id . '" checked><span class="slider round"></span></label>'
                    : '<label class="switch"><input type="checkbox" class="active-toggle" data-id="' . $packages->id . '"><span class="slider round"></span></label>';
            })->addColumn('action', function (Packages $packages) {
                return view('admin.pages.packages.buttons', compact('packages'));
            })
            ->rawColumns(['image', 'action', 'is_active'])
            ->startsWithSearch()
            ->make(true);
    }

    public function toggleActiveStatus(Request $request)
    {
        $packages = Packages::findOrFail($request->id);
        $packages->is_active = !$packages->is_active;
        $packages->save();
        return response()->json(['success' => true, 'is_active' => $packages->is_active]);
    }

    public function viewRegistrationPackages($packagesId)
    {
        $package = Packages::findOrFail($packagesId);
        $registrations = RegistrationPackages::where('packages_id', $packagesId)->get();
        return view('admin.pages.packages.viewRegistrationPackages', compact('package', 'registrations'));
    }

    /**
     * Display a Single Row of the resource.
     */
    public function Show($id): View
    {
        $packages = Packages::find($id);
        return view('admin.pages.packages.show', get_defined_vars());
    }

    public function create(): View
    {
        $levels = Level::get();
        return view('admin.pages.packages.form', new PackagesViewModel(), get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PackagesRequest $request)
    {
        // return $request;
        $this->packages->createPackages($request->validated());
        session()->flash('success', TranslationHelper::translate('Operation Success'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Packages $packages): View
    {
        // $tags = Tag::get();
        // $categories = Level::get();
        $levels = Level::get();
        // $tags = Tag::select('id', 'name')->get();
        $categories = Level::select('id', 'name')->get();
        return view('admin.pages.packages.form', new PackagesViewModel($packages), get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PackagesRequest $request, Packages $packages): RedirectResponse
    {
        //        return $request;
        dd($request->validated());
        $this->packages->updatePackages($packages, $request->validated());
        session()->flash('success', TranslationHelper::translate('Successfully Updated'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Packages $packages): JsonResponse
    {
        $this->packages->deletePackages($packages);
        return response()->json(['status' => 'success', 'message' => TranslationHelper::translate('Successfully Deleted')]);
    }


    public function reorder(Packages $packages)
    {
        return $this->packages->reorder($packages, 'name', 'admin.pages.packages.reorder', 1);
    }

    public function saveReorder(Request $request, Packages $packages)
    {
        $all_entries = $request->input('tree');
        return $this->packages->saveReorder($all_entries, $packages);
    }

}
