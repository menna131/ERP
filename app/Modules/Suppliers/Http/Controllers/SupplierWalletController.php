<?php

namespace Suppliers\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Suppliers\Models\SupplierWallet;
use Yajra\Datatables\Datatables;

class SupplierWalletController extends Controller
{
    //
    public function index()
    {
        return view('Suppliers::supplierWallet.index');
    }

public function supplierWalletData(){

    $data= SupplierWallet::join('suppliers','suppliers.id','=','supplier_wallets.supplier_id')->select('supplier_wallets.*','suppliers.name as supplier_name' )->get();
    return Datatables::of($data)
          ->addIndexColumn()
          ->addColumn('action', function($row) {
              $btn = "<a class='btn btn-primary btn-sm' rel='tooltip' title='".__('translation.title.show Transactions') ."'
              href='".route('show.supplier.wallet.trans', $row->slug)."'> <i class='material-icons'>visibility</i> </a>";
              $btn .= "<a class='btn btn-info btn-sm' rel='tooltip' title='".__('translation.title.Add Transaction')."'
              href='".route('create.supplier.wallet.trans', $row->slug)."'><i class='fa fa-plus-circle' aria-hidden='true'></i></a>";
              return $btn;
          })
          ->rawColumns(['action'])
          ->make(true);

}

}
