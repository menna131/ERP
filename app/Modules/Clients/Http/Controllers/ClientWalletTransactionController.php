<?php


namespace Clients\Http\Controllers;


use Illuminate\Support\Facades\Route;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Clients\Models\ClientWallet;
use Users\Models\UserWallet;
use Clients\Models\ClientWalletTransaction;
use Illuminate\Http\Request;
use App\Http\services\walletService;
use Illuminate\Support\Facades\Auth;

class ClientWalletTransactionController extends Controller
{

    public function show(ClientWallet $clientwallet)
    {
        return view('clients::clientWalletTransaction.show',compact('clientwallet'));
    }

    public function clientWalletTransData(ClientWallet $clientwallet)
    {
            $data = $clientwallet->ClientWalletTransactions;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {

                        $btn ="<a class='delete-button btn btn-danger btn-sm' rel='tooltip' title='".__('translation.title.Delete Transaction')."'  href='javascript:void(0)' data='$row->id'><i class='material-icons'>close</i></a>";
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function create(ClientWallet $clientwallet)
    {
        return view('clients::clientWalletTransaction.create',compact('clientwallet'));
    }

    public function store(Request $request, ClientWallet $clientwallet, walletService $walletService)
    {
        $userWallet = UserWallet::where('user_id', Auth::id())->first();
        $transactionData = [
                    'model_type' => 'Models\Sale',
                    'model_id' => $clientwallet->id,
                    'date'=>$request->date,
                    'amount' =>$request->input('amount')
                ];
                $message = $walletService->paymentIn($userWallet, $transactionData,$clientwallet)->responeHandle();

                if($request->input('redirect') == 'table')
                return redirect()->route('show.client.wallet.trans',$clientwallet->slug)->with('message',$message);
            elseif($request->input('redirect') == 'back')
                return redirect()->back()->with('message',$message);
    }

    public function destroy( ClientWalletTransaction $ClientWalletTransaction ,Request $request)
    {
               $ClientWalletTransaction->delete();
        return redirectAccordingToRequest($request);
    }

}
