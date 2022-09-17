<?php

namespace Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Suppliers\Models\Supplier;
use Users\Models\Setting;
use Users\Models\User;
use Users\Models\UserWallet;
use Users\Models\UserWalletTransaction;
use Yajra\DataTables\Facades\DataTables;

class UserWalletController extends Controller
{
    private const notCompleted =3;
    public function index()
    {
        $user = User::first();
        return view('users::userWallet.index', compact('user'));
    }
    public function userWalletData(){

        // $data = UserWalletTransaction::all();
        $data = UserWalletTransaction::latest()->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        return view('users::userWallet.create');
    }
    public function store(Request $request)
    {
        $request->validate(['total_value'=>['required','numeric']]);
        $data = requestAbstraction($request);
        $data['total_paid']=0;
        $data['total_pending']=0;
        $data['number_of_transaction']=0;
        $user_id = User::first()->id;
        $data['user_id'] = $user_id;
        $data['status'] = 1;
        UserWallet::create($data);
        Setting::first()->update(['open_account'=>$data['total_value'],'status' => self::notCompleted]);
        return  redirect()->route('settings');
    }
}
