<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderCard\OrderCardRequest;
use App\Models\OrderCard;
use App\Models\Voucherspage;
use App\Services\OrderCardService;
use App\Services\VoucherspageService;
use App\ViewModels\OrderCardViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class VoucherspageController extends Controller
{
    private $voucherspage;

    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:voucherspage.view_all'], ['only' => ['index']]);
        $this->middleware(['auth:admin', 'permission:voucherspage.view_details'], ['only' => ['show']]);
        $this->middleware(['auth:admin', 'permission:voucherspage.create'],['only' => ['create', 'store']]);
        $this->middleware(['auth:admin', 'permission:voucherspage.edit'],['only' => ['edit', 'update']]);
        $this->middleware(['auth:admin', 'permission:voucherspage.delete'], ['only' => ['destroy']]);
        $this->voucherspage = new VoucherspageService();
    }

    /**
     * Display a listing of the voucherspage.
     */
    public function index(Request $request): View
    {
        // dd($request->all());
        return view('admin.pages.voucherspage.index');
    }


    public function table(DataTables $dataTables, Request $request)
    {
        $model = Voucherspage::with(['coupon', 'user', 'lessons'])->ordered();

        return $dataTables->eloquent($model)
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($search = $request->get('search')['value']) {
                    $query->where('client_title', 'LIKE', "%$search%");
                }
            })
            ->editColumn('client_title', function (Voucherspage $voucherspage) {
                return $voucherspage->client_title ?? '-';
            })
            ->editColumn('coupon_title', function (Voucherspage $voucherspage) {
                return $voucherspage->coupon_title ?? '-';
            })
            ->editColumn('lesson_title', function (Voucherspage $voucherspage) {
                return $voucherspage->lesson_title ?? '-';
            })
            ->editColumn('package_title', function (Voucherspage $voucherspage) {
                return $voucherspage->package_title ?? '-';
            })
            ->editColumn('level_title', function (Voucherspage $voucherspage) {
                return $voucherspage->level_title ?? '-';
            })
            ->editColumn('created_at', function (Voucherspage $voucherspage) {
                return $voucherspage->created_at?->format('d-m-Y') ?? '-';
            })
            ->addColumn('action', function (Voucherspage $voucherspage) {
                return view('admin.pages.voucherspage.buttons', compact('voucherspage'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    // public function table(DataTables $dataTables, Request $request)
    // {
    //     $model = Voucherspage::with(['coupon', 'user', 'lessons'])->ordered();

    //     return $dataTables->eloquent($model)
    //         ->addIndexColumn()
    //         ->filter(function ($query) use ($request) {
    //             if ($search = $request->get('search')['value']) {
    //                 $query->whereHas('user', function ($q) use ($search) {
    //                     $q->where('name', 'LIKE', "%$search%");
    //                 });
    //             }
    //         })
    //         ->editColumn('client_title', function (Voucherspage $voucherspage) {
    //             return $voucherspage->client_title ?? '-';
    //         })

    //                     ->editColumn('coupon_title', function (Voucherspage $voucherspage) {
    //             return optional($voucherspage->coupon_title) ?? '-';
    //         })

    //         ->editColumn('lesson_title', function (Voucherspage $voucherspage) {
    //             return $voucherspage->lesson_title ?? '-';
    //         })

    //         ->editColumn('package_title', function (Voucherspage $voucherspage) {
    //             return $voucherspage->package_title ?? '-';
    //         })
    //     // package
    //         ->editColumn('level_title', function (Voucherspage $voucherspage) {
    //             return $voucherspage->level_title ?? '-';
    //         })
    //         ->editColumn('created_at', function (Voucherspage $voucherspage) {
    //             return $voucherspage->created_at?->format('d-m-Y') ?? '-';
    //         })
    //         ->addColumn('action', function (Voucherspage $voucherspage) {
    //             return view('admin.pages.voucherspage.buttons', compact('voucherspage'));
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    // }


    // public function table(DataTables $dataTables, Request $request)
    // {
    //     // $model = OrderCard::with(['client', 'offer', 'product', 'coupon'])->ordered();
    //     $model = OrderCard::query();
    //     return $dataTables->eloquent($model)
    //         ->addIndexColumn()
    //         ->filter(
    //             function ($query) use ($request) {
    //                 if ($search = $request->get('search')['value']) { 
    //                     $query->where(function ($q) use ($search) {
    //                         $q->where('first_name', 'LIKE', "%$search%");
    //                     });
    //                 }
    //             }
    //         )
    //         ->editColumn('first_name', function (OrderCard $voucherspage) {
    //             return $voucherspage->first_name ?? '-';
    //         })
    //         ->editColumn('phone', function (OrderCard $voucherspage) {
    //             return $voucherspage->phone ?? '-';
    //         })
    //         ->editColumn('category_card', function (OrderCard $voucherspage) {
    //             return $voucherspage->cards->category_card ?? '-';
    //         })
    //         ->editColumn('categorycolid', function (OrderCard $voucherspage) {
    //             return $voucherspage->cards->categorycolid->name ?? '-';
    //         })
    //         ->editColumn('price', function (OrderCard $voucherspage) {
    //             return $voucherspage->cards->price ?? '-';
    //         })
    //         ->editColumn('number_card', function (OrderCard $voucherspage) {
    //             return $voucherspage->number_card ?? '-';
    //         })
    //         ->editColumn('total_price', function (OrderCard $voucherspage) {
    //             return $voucherspage->total_price ?? '-';
    //         })

    //         ->editColumn('created_at', function (OrderCard $voucherspage) {
    //             return $voucherspage->created_at->format('d-m-Y') ?? '-';
    //         })
    //         ->addColumn('action', function (OrderCard $voucherspage) {
    //             return view('admin.pages.voucherspage.buttons', compact('voucherspage'));
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    // }





    // public function Show($id): View
    // {
    //     $voucherspage = OrderCard::find($id);
    //     return view('admin.pages.voucherspage.show', get_defined_vars());
    // }



    // public function destroy(OrderCard $voucherspage): JsonResponse
    // {
    //     $this->voucherspage->deleteOrderCard($voucherspage);
    //     return response()->json(['status' => 'success', 'message' => TranslationHelper::translate('Successfully Deleted')]);
    // }

    // public function reorder(OrderCard $voucherspage)
    // {
    //     return $this->voucherspage->reorder($voucherspage, 'name', 'admin.pages.voucherspage.reorder', 1);
    // }

    // public function saveReorder(Request $request, OrderCard $voucherspage)
    // {
    //     $all_entries = $request->input('tree');
    //     return $this->voucherspage->saveReorder($all_entries, $voucherspage);
    // }

}
