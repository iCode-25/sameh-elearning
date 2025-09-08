<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\ClientRequest;
use App\Models\Client;
use App\Models\Level;
use App\Models\City;
use App\Models\Country;
use App\Models\Region;
use App\Models\Tag;
use App\Models\User;
use App\Services\ClientService;
use App\ViewModels\ClientViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class ClientController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:client.view_all'], ['only' => ['index']]);
        $this->middleware(['auth:admin', 'permission:client.view_details'], ['only' => ['show']]);
        $this->middleware(['auth:admin', 'permission:client.create'], ['only' => ['create', 'update']]);
        $this->middleware(['auth:admin', 'permission:client.edit'], ['only' => ['edit', 'store']]);
        $this->middleware(['auth:admin', 'permission:client.delete'], ['only' => ['destroy']]);
        $this->middleware(['auth:admin', 'permission:client.sort'], ['only' => ['reorder', 'saveReorder']]);
        $this->client = new ClientService();
    }

    /**
     *
     *
     * Display a listing of the client.
     */
    public function index(Request $request): View
    {
        return view('admin.pages.client.index' , get_defined_vars() );
    }



    public function table(DataTables $dataTables, Request $request)
    {
        $model = User::with('level')
            ->where('is_admin', 0)
            ->orderBy('id', 'desc');
        $model = $model->when($request->get('search_value'), function ($query, $search_value) {
            $query->where(function ($q) use ($search_value) {
                $q->where('name', 'LIKE', '%' . $search_value . '%')
                    ->orWhere('email', 'LIKE', '%' . $search_value . '%')
                    ->orWhere('phone', 'LIKE', '%' . $search_value . '%');
            });
        });
        $model = $model->when($request->get('gender'), function ($query, $gender) {
            $query->where('gender', $gender);
        });
        $model = $model->when($request->get('level'), function ($query, $level) {
            $query->where('level_id', $level);
        });
        $model = $model->when($request->get('created_at'), function ($query, $date) {
            $query->whereDate('created_at', $date);
        });
        return $dataTables->eloquent($model)
            ->addIndexColumn()
            ->editColumn('name', fn($client) => $client->name ?? '-')
            ->editColumn('email', fn($client) => $client->email ?? '-')
            ->editColumn('level', fn($client) => $client->level->name ?? '-')
            ->editColumn('phone', fn($client) => $client->phone ?? '-')
            ->editColumn('gender', fn($client) => $client->gender ?? '-')

            ->editColumn('type', fn($client) => $client->type ?? '-')

        
            ->editColumn('created_at', fn($client) => $client->created_at?->format('d-m-Y') ?? '-')
            ->addColumn('ban', function ($client) {
                return $client->is_banned
                    ? '<label class="switch"><input type="checkbox" class="ban-toggle" data-id="' . $client->id . '" checked><span class="slider round"></span></label>'
                    : '<label class="switch"><input type="checkbox" class="ban-toggle" data-id="' . $client->id . '"><span class="slider round"></span></label>';
            })

            ->addColumn('is_active', function ($client) {
                $iconClass = $client->is_active ? 'fas' : 'far'; // fas = filled star, far = outlined star
                $color = $client->is_active ? 'gold' : 'gray';
                $tooltip = $client->is_active ? 'Exceptional Student' : 'Mark as Exceptional';
                return '<i class="' . $iconClass . ' fa-star toggle-exceptional" title="' . $tooltip . '" data-id="' . $client->id . '" style="cursor: pointer; color:' . $color . '; font-size: 20px;"></i>';
            })

            ->addColumn('action', function ($client) {
                return view('admin.pages.client.buttons', compact('client'))->render();
            })
            ->rawColumns(['ban', 'action' ,'is_active'])
            ->make(true);
    }




    public function show($id): View
    {
        $client = User::with('level')->findOrFail($id);
        return view('admin.pages.client.show', compact('client'));
    }


    // public function toggleActiveStatus(Request $request)
    // {
    //     $client = User::findOrFail($request->id);
    //     $client->is_active = !$client->is_active;
    //     $client->save();
    //     return response()->json(['success' => true, 'is_active' => $client->is_active]);
    // }

    public function toggleActiveStatus(Request $request)
    {
        $client = User::findOrFail($request->id);

        if (!$client->is_active) {
            $days = $request->input('days', 3); 
            $client->is_active = true;
            $client->active_until = now()->addDays($days);
        } else {
            $client->is_active = false;
            $client->active_until = null;
        }
        $client->save();
        return response()->json([
            'success' => true,
            'is_active' => $client->is_active,
            'active_until' => $client->active_until
        ]);
    }



    // public function ban(Request $request)
    // {
    //     try {
    //         $client = Client::findOrFail($request->id);
    //         $client->update(['is_banned' => $request->is_banned]);
    //         return response()->json([
    //             'success' => true,
    //             'message' => $request->is_banned ? 'تم حظر العميل بنجاح.' : 'تم إلغاء حظر العميل بنجاح.'
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'حدث خطأ أثناء تحديث حالة العميل.'
    //         ]);
    //     }
    // }



    public function ban(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            $user->update(['is_banned' => $request->is_banned]);

            return response()->json([
                'success' => true,
                'message' => TranslationHelper::translate($request->is_banned
                    ? 'User has been banned successfully.'
                    : 'User has been unbanned successfully.')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => TranslationHelper::translate('An error occurred while updating user status.')
            ]);
        }
    }

    public function destroy(User $user): JsonResponse
    {
        $this->deleteClient($user);

        return response()->json([
            'status' => 'success',
            'message' => TranslationHelper::translate('Successfully Deleted')
        ]);
    }


    public function deleteClient(User $user)
    {
        $user->delete();
    }


    // public function destroy(User $client): JsonResponse
    // {
    //     $this->client->deleteClient($client);
    //     return response()->json(['status' => 'success', 'message' => TranslationHelper::translate('Successfully Deleted')]);
    // }

    // public function destroy(User $user): JsonResponse
    // {
    //     $user->delete();
    //     return response()->json([
    //         'status' => 'success',
    //         'message' => TranslationHelper::translate('Successfully Deleted')
    //     ]);
    // }





    // public function table(DataTables $dataTables, Request $request)
    // {
    //     $model = Client::with('city')
    //     ->orderBy('id', 'desc');
    //     $model = $model->when($request->get('search_value'), function ($query, $search_value) {
    //         $query->where(function ($q) use ($search_value) {
    //             $q->where('name', 'LIKE', '%' . $search_value . '%')
    //              ;
    //         });
    //     });
    //     $model = $model->when($request->get('category'), function ($query, $category) {
    //         $query->where('category', $category);
    //     })
    //     ->when($request->get('city_name'), function ($query, $city_name) {
    //         $query->whereHas('city', function ($q) use ($city_name) {
    //             $q->where('name', 'LIKE', '%' . $city_name . '%');
    //         });
    //     })
    //     ->when($request->get('created_at'), function ($query, $created_at) {
    //         $query->whereDate('created_at', $created_at);
    //     });
    //     return $dataTables->eloquent($model)
    //         ->addIndexColumn()
    //           ->editColumn('name', function (Client $client) {
    //             return $client->name ?? '-';
    //         })
    //            ->editColumn('email', function (Client $client) {
    //             return $client->email ?? '-';
    //         })
    //         ->editColumn('level', function (Client $client) {
    //             return $client->level->name ?? '-';
    //         })
    //         ->editColumn('phone', function (Client $client) {
    //             return $client->phone ?? '-';
    //         })
    //         ->editColumn('gender', function (Client $client) {
    //             return $client->gender ?? '-';
    //         })
    //         ->editColumn('created_at', function (Client $client) {
    //             return $client->created_at ? $client->created_at->format('d-m-Y') : '-';
    //         })
    //         ->addColumn('ban', function (Client $client) {
    //             return $client->is_banned
    //                 ? '<label class="switch"><input type="checkbox" class="ban-toggle" data-id="' . $client->id . '" checked><span class="slider round"></span></label>'
    //                 : '<label class="switch"><input type="checkbox" class="ban-toggle" data-id="' . $client->id . '"><span class="slider round"></span></label>';
    //         })
    //         ->addColumn('action', function (Client $client) {
    //             return view('admin.pages.client.buttons', compact('client'))->render();
    //         })
    //         ->rawColumns(['ban', 'action', 'is_active'])
    //         ->make(true);
    // }




    // public function showPoints($id)
    // {
    //     $clients = Client::find($id);
    //     return view('admin.pages.client.showpoints', get_defined_vars());
    // }




    /**
     * Show the form for creating a new client.
     */
    // public function create(): View
    // {
    //     $cities = City::get();
    //     return view('admin.pages.client.form',  new ClientViewModel(), get_defined_vars());
    // }



    // public function createpoints($id): View
    // {
    //     $client = Client::findOrFail($id);
    //     return view('admin.pages.client.form_points', compact('client'));
    // }


    /**
     * Store a newly created resource in storage.
     */
    // public function store(ClientRequest $request)
    // {
    //     // return $request;
    //     $this->client->createClient($request->validated());
    //     session()->flash('success', TranslationHelper::translate('Operation Success'));
    //     return back();
    // }

    // public function storePoints(Request $request, $id)
    // {
    //     $request->validate([
    //         'points' => 'required|integer|min:1',
    //     ], [
    //         'points.required' => 'النقاط مطلوبة.',
    //         'points.integer' => 'النقاط يجب أن تكون عددًا صحيحًا.',
    //         'points.min' => 'يجب أن تكون النقاط على الأقل 1.',
    //     ]);
    //     $client = Client::findOrFail($id);
    //     $client->points = (int) $client->points;
    //     $client->points += $request->input('points');
    //     $client->save();
    //     session()->flash('success', TranslationHelper::translate('Operation Success'));
    //     return back();
    // }



   

    // public function getRegions($cityId)
    // {
    //     $regions = Region::where('city_id', $cityId)->get();

    //     return response()->json([
    //         'regions' => $regions
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Client $client): View
    // {
    //     $cities = City::get();
    //     $regions = Region::get();
    //     $countries = Country::get();
    //     return view('admin.pages.client.form',  new ClientViewModel($client), get_defined_vars());
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(ClientRequest $request, Client $client): RedirectResponse
    // {
    //         //    return $request;
    //     $this->client->updateClient($client, $request->validated());
    //     session()->flash('success', TranslationHelper::translate('Successfully Updated'));
    //     return back();
    // }

    /**
     * Remove the specified resource from storage.
     */

   

    // public function reorder(Client $client)
    // {
    //     return $this->client->reorder($client, 'name', 'admin.pages.client.reorder', 1);
    // }

    // public function saveReorder(Request $request, Client $client)
    // {
    //     $all_entries = $request->input('tree');
    //     return $this->client->saveReorder($all_entries, $client);
    // }

}
