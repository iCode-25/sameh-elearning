<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Models\Transfer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class TransferController extends Controller
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



    // public function table(DataTables $dataTables, Request $request)
    // {
    //     $model = Transfer::with(['user.level', 'video', 'package'])
    //         ->select('payout_transfers.*');
    //     if ($request->filled('name')) {
    //         $model = $model->whereHas('user', function ($query) use ($request) {
    //             $query->where('name', 'LIKE', '%' . $request->name . '%');
    //         });
    //     }
    //     return $dataTables->eloquent($model)
    //         ->addIndexColumn()
    //         ->editColumn('id', function (Transfer $transfer) {
    //             return $transfer->id ?? '-';
    //         })
    //         ->editColumn('client_title', function (Transfer $transfer) {
    //             return $transfer->client_title ?? '-';
    //         })
    //         ->editColumn('videos_title', function (Transfer $transfer) {
    //             return $transfer->videos_title ?? '-';
    //         })
    //         ->editColumn('packages_title', function (Transfer $transfer) {
    //             return $transfer->packages_title ?? '-';
    //         })
    //         ->editColumn('level_title', function (Transfer $transfer) {
    //             return $transfer->level_title ?? '-';
    //         })
    //         ->editColumn('amount_title', function (Transfer $transfer) {
    //             return $transfer->amount_title ?? '-';
    //         })
    //         ->editColumn('created_at', function (Transfer $transfer) {
    //             return $transfer->created_at ? $transfer->created_at->format('d-m-Y') : '-';
    //         })
    //         ->addColumn('action', function (Transfer $transfer) {
    //             return view('admin.pages.transfer.buttons', compact('transfer'));
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    // }

    public function table(DataTables $dataTables, Request $request)
    {
        $model = Transfer::with(['user.level', 'video', 'package'])
            ->select('payout_transfers.*');

        if ($request->filled('name')) {
            $model = $model->where('client_title', 'LIKE', '%' . $request->name . '%');
        }

        return $dataTables->eloquent($model)
            ->addIndexColumn()
            ->editColumn('id', function (Transfer $transfer) {
                return $transfer->id ?? '-';
            })
            ->editColumn('client_title', function (Transfer $transfer) {
                return $transfer->client_title ?? '-';
            })
            ->editColumn('videos_title', function (Transfer $transfer) {
                return $transfer->videos_title ?? '-';
            })
            ->editColumn('packages_title', function (Transfer $transfer) {
                return $transfer->packages_title ?? '-';
            })
            ->editColumn('level_title', function (Transfer $transfer) {
                return $transfer->level_title ?? '-';
            })
            ->editColumn('amount_title', function (Transfer $transfer) {
                return $transfer->amount_title ?? '-';
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
