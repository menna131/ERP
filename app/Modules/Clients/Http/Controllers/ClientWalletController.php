<?php

namespace Clients\Http\Controllers;

use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Clients\Models\ClientWallet;
use Users\Models\UserWallet;
use Clients\Models\ClientWalletTransaction;
use Illuminate\Http\Request;
use App\Http\services\walletService;
use Illuminate\Support\Facades\Auth;

class ClientWalletController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('clients::clientWallet.index');
    }

    public function clientWalletData()
    {
            $data= ClientWallet::join('clients','clients.id','=','client_wallets.client_id')->select('client_wallets.*','clients.name as client_name' )->get();
              return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
                        $btn = "<a class='btn btn-primary btn-sm' rel='tooltip' title='".__('translation.title.show Transactions') ."'
                        href='".route('show.client.wallet.trans', $row->slug)."'> <i class='material-icons'>visibility</i> </a>";
                        $btn .= "<a class='btn btn-info btn-sm' rel='tooltip' title='".__('translation.title.Add Transaction')."'
                        href='".route('create.wallet.trans', $row->slug)."'><i class='fa fa-plus-circle' aria-hidden='true'></i></a>";
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }


}
