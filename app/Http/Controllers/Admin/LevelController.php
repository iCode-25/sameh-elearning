<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Level\LevelRequest;
use App\Models\Level;
use App\Models\ServiceSubLevel;
use App\Services\LevelService;
use App\ViewModels\LevelViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class LevelController extends Controller
{
    private $level;

    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:level.view_all'], ['only' => ['index']]);
        $this->middleware(['auth:admin', 'permission:level.view_details'], ['only' => ['show']]);
        $this->middleware(['auth:admin', 'permission:level.create'], ['only' => ['create', 'store']]);
        $this->middleware(['auth:admin', 'permission:level.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['auth:admin', 'permission:level.delete'], ['only' => ['destroy']]);
        $this->middleware(['auth:admin', 'permission:level.sort'], ['only' => ['reorder', 'saveReorder']]);
        $this->level = new LevelService();
    }

    /**
     * Display a listing of the level.
     */
    public function index(Request $request) : View
    {
        return view('admin.pages.level.index');
    }

    public function table(DataTables $dataTables, Request $request) {
        $model = Level::ordered();
        return $dataTables->eloquent($model)->addIndexColumn()
            ->editColumn('id', function (Level $level) {
                return $level->id ?? '-';
            })->editColumn('name', function (Level $level) {
                return $level->name;
            })->editColumn('created_at', function (Level $level) {
                return $level->created_at->format('d-m-Y h:i A') ?? '-';
            })->addColumn('action', function (Level $level) {
                return view('admin.pages.level.buttons', compact('level'));
            })
            ->rawColumns(['image','action'])
            ->startsWithSearch()
            ->make(true);
    }

    /**
     * Display a Single Row of the resource.
     */
    public function Show($id): View
    {
        $level = Level::find($id);
        return view('admin.pages.level.show' , get_defined_vars());
    }

    /**
     * Show the form for creating a new level.
     */
    public function create() : View
    {
        return view('admin.pages.level.form' ,  new LevelViewModel());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LevelRequest $request) : RedirectResponse
    {
        $this->level->createLevel($request->validated());
        session()->flash('success', TranslationHelper::translate('Operation Success'));
        return back();
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level) : View
    {
        return view('admin.pages.level.form' ,  new LevelViewModel($level));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(LevelRequest $request, Level $level) : RedirectResponse
    {
//        return $request;
        $this->level->updateLevel($level , $request->validated());
        session()->flash('success', TranslationHelper::translate('Successfully Updated'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level) : JsonResponse
    {
        $this->level->deleteLevel($level);
        return response()->json(['status' => 'success', 'message' => TranslationHelper::translate('Successfully Deleted')]);
    }

    public function reorder(Level $level) {
        return $this->level->reorder($level, 'name', 'admin.pages.level.reorder', 1);
    }


    public function saveReorder(Request $request, Level $level) {
        $all_entries = \Request::input('tree');
        return $this->level->saveReorder($all_entries, $level);
    }

    public function getSubsFromMain(Request $request) {
        $data = ServiceSubLevel::where('service_level_id', $request->id)->get();
        return response()->json(['msg' => 'Collection of Sublevels', 'status' => 1, 'data' => $data]);
    }

}
