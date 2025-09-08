<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Transfer\TransferRequest;
use App\Models\Transfer;
use App\Services\TransferService;
use App\ViewModels\TransferViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class CouponPurchaseTransactionsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:transfers.view_all'], ['only' => ['index']]);
        $this->middleware(['auth:admin', 'permission:transfers.view_details'], ['only' => ['show']]);
        $this->middleware(['auth:admin', 'permission:transfers.create'], ['only' => ['create', 'store']]);
        $this->middleware(['auth:admin', 'permission:transfers.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['auth:admin', 'permission:transfers.delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the transfer.
     */
    public function index(Request $request) : View
    {
        return view('admin.pages.transfer.index');
    }

    public function table(DataTables $dataTables, Request $request)
    {
        $model = Transfer::with(['user.level', 'video', 'package'])
            ->select('payout_transfers.*');

        if ($request->has('search') && !empty($request->search['value'])) {
            $search = $request->search['value'];
            $model = $model->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            });
        }

        return $dataTables->eloquent($model)
            ->addIndexColumn()

            ->editColumn('id', function (Transfer $transfer) {
                return $transfer->id ?? '-';
            })

            ->editColumn('name', function (Transfer $transfer) {
                return $transfer->user->name ?? '-';
            })

            ->editColumn('video', function (Transfer $transfer) {
                return $transfer->video->name ?? '-';
            })

            ->editColumn('package', function (Transfer $transfer) {
                return $transfer->package->name ?? '-';
            })

            ->editColumn('level', function (Transfer $transfer) {
                return $transfer->user?->level?->name ?? '-';
            })

            ->editColumn('amount', function (Transfer $transfer) {
                return $transfer->amount ?? '-';
            })

            ->editColumn('method', function (Transfer $transfer) {
                return $transfer->method ?? '-';
            })

            ->editColumn('transfer_type', function (Transfer $transfer) {
                return $transfer->transfer_type ?? '-';
            })

            ->editColumn('created_at', function (Transfer $transfer) {
                return $transfer->created_at ? $transfer->created_at->format('d-m-Y') : '-';
            })

            ->addColumn('action', function (Transfer $transfer) {
                return view('admin.pages.transfer.buttons', compact('transfer'));
            })

            ->rawColumns(['action'])
            ->make(true);
    }



    // public function table(DataTables $dataTables, Request $request)
    // {
    //     $model = Transfer::with('client')->select('payout_transfers.*');
    //     if ($request->has('search') && !empty($request->search['value'])) {
    //         $search = $request->search['value'];
    //         $model = $model->whereHas('client', function ($query) use ($search) {
    //             $query->where('name', 'LIKE', '%' . $search . '%');
    //         });
    //     }
    //     return $dataTables->eloquent($model)
    //         ->addIndexColumn()
    //         ->editColumn('id', function (Transfer $transfer) {
    //             return $transfer->id ?? '-';
    //         })
    //         ->editColumn('name', function (Transfer $transfer) {
    //             return $transfer->client->name ?? '-';
    //         })
    //         ->editColumn('amount', function (Transfer $transfer) {
    //             return $transfer->amount ?? '-';
    //         })
    //         ->editColumn('method', function (Transfer $transfer) {
    //             return $transfer->method ?? '-';
    //         })
    //           ->editColumn('transfer_type', function (Transfer $transfer) {
    //             return $transfer->transfer_type ?? '-';
    //         })

    //          ->editColumn('created_at', function (Transfer $transfer) {
    //             return $transfer->created_at ? $transfer->created_at->format('d-m-Y') : '-';
    //         })
    //         ->addColumn('action', function (Transfer $transfer) {
    //             return view('admin.pages.transfer.buttons', compact('transfer'));
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    // }



    /**
     * Display a Single Row of the resource.
     */
    public function Show($id): View
    {
        $transfer = Transfer::find($id);
        return view('admin.pages.transfer.show' , get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transfer $transfer) : JsonResponse
    {
        $transfer->delete();
        return response()->json(['status' => 'success', 'transfer' => TranslationHelper::translate('Successfully Deleted')]);

    }

}
