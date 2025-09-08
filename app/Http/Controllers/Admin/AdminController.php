<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\AdminStoreRequest;
use App\Http\Requests\Admin\Admin\AdminUpdateRequest;
use App\Models\User;
use App\Services\AdminService;
use App\ViewModels\AdminViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    private $admin;

    public function __construct()
    {
       $this->admin = new AdminService();
        $this->middleware(['auth:admin', 'permission:admins.view_all'], ['only' => ['index']]);
        $this->middleware(['auth:admin', 'permission:admins.view_details'], ['only' => ['show']]);
        $this->middleware(['auth:admin', 'permission:admins.create'], ['only' => ['edit', 'update']]);
        $this->middleware(['auth:admin', 'permission:admins.edit'], ['only' => ['index']]);
        $this->middleware(['auth:admin', 'permission:admins.delete'], ['only' => ['destroy']]);
        
    }

    /**
     * Display a listing of the category.
     */
    public function index(Request $request) : View
    {
        // $branches = Branche::all();
        $roles = Role::all();
        return view('admin.pages.admin.index', get_defined_vars());
    }

    // public function table(DataTables $dataTables, Request $request) {
    //     $model = User::query()->users();
    //     // dd($model);
    //     return $dataTables->eloquent($model)
    //         ->addIndexColumn()

    //         ->editColumn('role_name', function (User $admin) {
    //             return $admin->roles()->first()->name ?? '-';
    //         })
    //         ->editColumn('branche_name', function (User $admin) {
    //             return $admin->roles()->first()->name ?? '-';
    //         })
    //         ->editColumn('created_at', function (User $admin) {
    //             return $admin->created_at->format('d-m-Y h:i A') ?? '-';
    //         })
    //         ->addColumn('action', function (User $admin) {
    //             return view('admin.pages.admin.buttons', compact('admin'));
    //         })
    //         ->rawColumns(['image', 'action'])
    //         ->startsWithSearch()
    //         ->make(true); 
    // }
   
    public function table(DataTables $dataTables, Request $request)
    {
        // $model = User::query();
        $model = User::where('is_admin', 1);


        return $dataTables->eloquent($model)
            ->addIndexColumn()
            ->filter(
                function ($query) use ($request) {
                    if ($search = $request->get('search')['value']) { 
                        $query->where(function ($q) use ($search) {
                            $q->where('name', 'LIKE', "%$search%");
                        });
                    }
            })
            ->editColumn('role_name', function (User $admin) {
                return $admin->roles()->first()->name ?? '-'; 
            })

            ->editColumn('created_at', function (User $admin) {
                return $admin->created_at->format('d-m-Y') ?? '-';
            })
            ->addColumn('action', function (User $admin) {
                return view('admin.pages.admin.buttons', compact('admin'));
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
        // $branches = Branche::all();
        $admin = User::find($id);
        return view('admin.pages.admin.show' , get_defined_vars());
    }

    /**
     * Show the form for creating a new category.
     */
    public function create() : View
    {
        // $branches = Branche::all();
        $roles = Role::all();
        return view('admin.pages.admin.form' ,  new AdminViewModel(), get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreRequest $request): RedirectResponse
    {
        $this->admin->createAdmin($request->validated());
        session()->flash('success', TranslationHelper::translate('Operation Success'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin) : View
    {
        // $branches = Branche::all();
        $roles = Role::all();
        return view('admin.pages.admin.form' ,  new AdminViewModel($admin), get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRequest $request, User $admin) : RedirectResponse
    {
//        return $request
        $this->admin->updateAdmin($admin , $request->validated());
        session()->flash('success', TranslationHelper::translate('Successfully Updated'));
        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin) : JsonResponse
    {
        $this->admin->deleteAdmin($admin);
        return response()->json(['status' => 'success', 'message' => TranslationHelper::translate('Successfully Deleted')]);
    }

    public function reorder(User $admin) {
        return $this->admin->reorder($admin, 'name', 'admin.pages.admin.reorder', 1);
    }

    public function saveReorder(Request $request, User $admin) {
        $all_entries = \Request::input('tree');
        return $this->admin->saveReorder($all_entries, $admin);
    }

}
