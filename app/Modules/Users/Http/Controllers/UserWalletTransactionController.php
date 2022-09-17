<?php

namespace Users\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\services\walletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Users\Models\UserWallet;
use Users\Models\UserWalletTransaction;
use Yajra\DataTables\Facades\DataTables;

class UserWalletTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserWalletTransaction $userWalletTransaction)
    {
        return view('users::userWalletTransaction.index', compact($userWalletTransaction));
    }

    public function userWalletTransData(UserWallet $userWallet)
    {
        $data = $userWallet->userWalletTransactions;
        return Datatables::of($data)->make(true);
    }
}
