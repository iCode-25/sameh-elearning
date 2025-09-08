<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ControlExpirationDuration\ControlExpirationDurationRequest;
use App\Models\ControlExpirationDuration;
use App\Services\ControlExpirationDurationService;
use App\ViewModels\ControlExpirationDurationViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class ControlExpirationDurationController extends Controller
{
    private $controlExpirationDuration;

    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:controlExpirationDuration.view_all'], ['only' => ['index']]);
        $this->middleware(['auth:admin', 'permission:controlExpirationDuration.view_details'], ['only' => ['show']]);
        $this->middleware(['auth:admin', 'permission:controlExpirationDuration.create'],['only' => ['create', 'store']]);
        $this->middleware(['auth:admin', 'permission:controlExpirationDuration.edit'],['only' => ['edit', 'update']]);
        $this->middleware(['auth:admin', 'permission:controlExpirationDuration.delete'], ['only' => ['destroy']]);
        $this->controlExpirationDuration = new ControlExpirationDurationService();
    }

    /**
     * Display a listing of the controlExpirationDuration.
     */
    public function index(Request $request): View
    {
        // dd($request->all());
        return view('admin.pages.controlExpirationDuration.index');
    }

    public function table(DataTables $dataTables, Request $request)
    {
        $model = ControlExpirationDuration::ordered();

        return $dataTables->eloquent($model)->addIndexColumn()
            ->editColumn('id', function (ControlExpirationDuration $controlExpirationDuration) {
                return $controlExpirationDuration->id ?? '-';

            })->editColumn('image', function (ControlExpirationDuration $controlExpirationDuration) {
                return "<img width='100' src=' " . $controlExpirationDuration->getFirstMediaUrl('controlExpirationDurations') . " '/>";
        })->editColumn('package_expiration_time', function (ControlExpirationDuration $controlExpirationDuration) {
            return $controlExpirationDuration->package_expiration_time;

            })->editColumn('lesson_expiration_time', function (ControlExpirationDuration $controlExpirationDuration) {
                return $controlExpirationDuration->lesson_expiration_time;




            })->editColumn('created_at', function (ControlExpirationDuration $controlExpirationDuration) {
                return $controlExpirationDuration->created_at->format('d-m-Y') ?? '-';
            })->addColumn('action', function (ControlExpirationDuration $controlExpirationDuration) {
                return view('admin.pages.controlExpirationDuration.buttons', compact('controlExpirationDuration'));
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
        $controlExpirationDuration = ControlExpirationDuration::find($id);
        return view('admin.pages.controlExpirationDuration.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new controlExpirationDuration.
     */
    public function create(): View
    {
        return view('admin.pages.controlExpirationDuration.form',  new ControlExpirationDurationViewModel());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ControlExpirationDurationRequest $request)
    {
        // return $request;
        $this->controlExpirationDuration->createControlExpirationDuration($request->validated());
        session()->flash('success', TranslationHelper::translate('Operation Success'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ControlExpirationDuration $controlExpirationDuration): View
    {
        return view('admin.pages.controlExpirationDuration.form',  new ControlExpirationDurationViewModel($controlExpirationDuration));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ControlExpirationDurationRequest $request, ControlExpirationDuration $controlExpirationDuration): RedirectResponse
    {
        //        return $request;
        $this->controlExpirationDuration->updateControlExpirationDuration($controlExpirationDuration, $request->validated());
        session()->flash('success', TranslationHelper::translate('Successfully Updated'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ControlExpirationDuration $controlExpirationDuration): JsonResponse
    {
        $this->controlExpirationDuration->deleteControlExpirationDuration($controlExpirationDuration);
        return response()->json(['status' => 'success', 'message' => TranslationHelper::translate('Successfully Deleted')]);
    }

    public function reorder(ControlExpirationDuration $controlExpirationDuration)
    {
        return $this->controlExpirationDuration->reorder($controlExpirationDuration, 'name', 'admin.pages.controlExpirationDuration.reorder', 1);
    }

    public function saveReorder(Request $request, ControlExpirationDuration $controlExpirationDuration)
    {
        $all_entries = $request->input('tree');
        return $this->controlExpirationDuration->saveReorder($all_entries, $controlExpirationDuration);
    }
}
