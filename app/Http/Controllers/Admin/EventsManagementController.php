<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventsManagement\EventsManagementRequest;
use App\Models\EventsManagement;
use App\Models\Level;
use App\Models\Tag;
use App\Services\EventsManagementService;
use App\ViewModels\EventsManagementViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class EventsManagementController extends Controller
{
    private $eventsManagement;

    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:eventsManagement.view_all'], ['only' => ['index']]);
        $this->middleware(['auth:admin', 'permission:eventsManagement.view_details'], ['only' => ['show']]);
        $this->middleware(['auth:admin', 'permission:eventsManagement.create'], ['only' => ['create', 'update']]);
        $this->middleware(['auth:admin', 'permission:eventsManagement.edit'], ['only' => ['edit', 'store']]);
        $this->middleware(['auth:admin', 'permission:eventsManagement.delete'], ['only' => ['destroy']]);
        $this->middleware(['auth:admin', 'permission:eventsManagement.sort'], ['only' => ['reorder', 'saveReorder']]);
        $this->eventsManagement = new EventsManagementService();
    }

    /**
     * Display a listing of the eventsManagement.
     */
    public function index(Request $request): View
    {
        return view('admin.pages.eventsManagement.index');
    }


    public function table(DataTables $dataTables, Request $request)
    {
        $model = EventsManagement::ordered();
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
            ->editColumn('id', function (EventsManagement $eventsManagement) {
                return $eventsManagement->id ?? '-';
            })->editColumn('name', function (EventsManagement $eventsManagement) {
                return $eventsManagement->name;

        })->editColumn('image', function (EventsManagement $eventsManagement) {
            $imageUrl = $eventsManagement->getFirstMediaUrl('events_management_image');
            $videoUrl = $eventsManagement->getFirstMediaUrl('events_managementvideo');

            if ($imageUrl) {
                return "<img width='100' src='{$imageUrl}' alt='EventsManagement Image'/>";
            } elseif ($videoUrl) {
                return "<video width='150' controls>
                    <source src='{$videoUrl}' type='video/mp4'>
                    Your browser does not support the video tag.
                </video>";
            } else {
                return "<img width='100' src='" . asset('path/to/default/image.jpg') . "' alt='Default Image'/>";
            }

            })->editColumn('created_at', function (EventsManagement $eventsManagement) {
                return $eventsManagement->created_at->format('d-m-Y h:i A') ?? '-';
            })->addColumn('action', function (EventsManagement $eventsManagement) {
                return view('admin.pages.eventsManagement.buttons', compact('eventsManagement'));
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
        $eventsManagement = EventsManagement::with('categories')->find($id);
        return view('admin.pages.eventsManagement.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new eventsManagement.
     */
    public function create(): View
    {
        // $tags = Tag::get();
        return view('admin.pages.eventsManagement.form',  new EventsManagementViewModel(), get_defined_vars());
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(EventsManagementRequest $request)
    {
        // return $request;
        $this->eventsManagement->createEventsManagement($request->validated());
        session()->flash('success', TranslationHelper::translate('Operation Success'));
        return back();
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventsManagement $eventsManagement): View
    {
        // $tags = Tag::get();
        return view('admin.pages.eventsManagement.form',  new EventsManagementViewModel($eventsManagement), get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventsManagementRequest $request, EventsManagement $eventsManagement): RedirectResponse
    {
        //        return $request;
        $this->eventsManagement->updateEventsManagement($eventsManagement, $request->validated());
        session()->flash('success', TranslationHelper::translate('Successfully Updated'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventsManagement $eventsManagement): JsonResponse
    {
        $this->eventsManagement->deleteEventsManagement($eventsManagement);
        return response()->json(['status' => 'success', 'message' => TranslationHelper::translate('Successfully Deleted')]);
    }


    public function reorder(EventsManagement $eventsManagement)
    {
        return $this->eventsManagement->reorder($eventsManagement, 'name', 'admin.pages.eventsManagement.reorder', 1);
    }

    public function saveReorder(Request $request, EventsManagement $eventsManagement)
    {
        $all_entries = $request->input('tree');
        return $this->eventsManagement->saveReorder($all_entries, $eventsManagement);
    }

}
