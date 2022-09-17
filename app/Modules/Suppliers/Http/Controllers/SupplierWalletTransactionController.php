<?php

namespace Suppliers\Http\Controllers;

use Illuminate\Http\Request;
use Users\Models\UserWallet;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\services\walletService;
use Illuminate\Support\Facades\Auth;
use Suppliers\Models\SupplierWallet;
use Suppliers\Models\SupplierWalletTransaction;

class SupplierWalletTransactionController extends Controller
{
    public function show(SupplierWallet $SupplierWallet)
    {
        return view('Suppliers::supplierWalletTransaction.show',compact('SupplierWallet'));
    }
    public function supplierWalletTransData(SupplierWallet $SupplierWallet)
    {
            $data = $SupplierWallet->supplierwalletTransactions;

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
                        $btn ="<a class='delete-button btn btn-danger btn-sm' rel='tooltip' title='".__('translation.title.Delete Transaction')."'  href='javascript:void(0)' data='$row->id'><i class='material-icons'>close</i></a>";
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function create(SupplierWallet $SupplierWallet)
    {

        return view('Suppliers::supplierWalletTransaction.create',compact('SupplierWallet'));
    }

    public function store(Request $request, SupplierWallet $SupplierWallet, walletService $walletService)
    {
        $userWallet = UserWallet::where('user_id', Auth::id())->first();
        $transactionData = [
                    'model_type' => 'Models\purchase',
                    'model_id' => $SupplierWallet->id,
                    'date'=>$request->date,
                    'amount' =>$request->input('amount')
                ];
                $message = $walletService->paymentOut($userWallet,$transactionData,$SupplierWallet)->responeHandle();

                if($request->input('redirect') == 'table')
                return redirect()->route('show.supplier.wallet.trans',$SupplierWallet->slug)->with('message',$message);
            elseif($request->input('redirect') == 'back')
                return redirect()->back()->with('message',$message);
    }

    public function destroy( SupplierWalletTransaction $SupplierWalletTransaction ,Request $request)
    {
        $SupplierWalletTransaction->delete();
        return redirectAccordingToRequest($request);
    }

}
