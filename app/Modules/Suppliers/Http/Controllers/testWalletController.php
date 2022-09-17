<?php
namespace Suppliers\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\services\walletService;
use Clients\Models\ClientWallet;
use Users\Models\User;
use Users\Models\UserWallet;
use Users\Models\UserWalletTransaction;
use Suppliers\Models\Supplier;
use Suppliers\Models\SupplierWallet;
use Suppliers\Models\SupplierWalletTransaction;

class testWalletController extends Controller {
    public function walletTest()
    {
        $balance = UserWallet::where('user_id',1)->first()->total_value;
        $transactions = UserWalletTransaction::where('user_wallet_id', 1)->get();
        return view('Suppliers::wallet-test', compact('balance', 'transactions'));
    }

    public function deposite(Request $request, walletService $walletService)
    {
        
        $userWallet = UserWallet::where('user_id',1)->first();
        $transactionData = [
            'model_type' => 'Models\Sale',
            'model_id' => 6,
            'date'=>date('Y-m-d H:i:s'),
            'amount' => $request->amount
        ];
        $message = $walletService->deposite($userWallet, $transactionData)->responeHandle();
        return redirect()->back()->with('message', $message);
    }

    public function withDraw(Request $request, walletService $walletService)
    {
        $userWallet = UserWallet::where('user_id',1)->first();
        $transactionData = [
            'model_type' => 'Models\Sale',
            'model_id' => 6,
            'date'=>date('Y-m-d H:i:s'),
            'amount' => $request->amount
        ];
        $message = $walletService->withdraw($userWallet, $transactionData)->responeHandle();
        return redirect()->back()->with('message', $message);
    }

    public function debit(Request $request, walletService $walletService)
    {
        $supplierWallet = SupplierWallet::where('supplier_id',11)->first();
        // $clientWallet = ClientWallet::where('client_id',11)->first();
        $transactionData = [
            'model_type' => 'Models\Sale',
            'model_id' => 6,
            'date'=>date('Y-m-d H:i:s'),
            'amount' => $request->amount
        ];
        $message = $walletService->debit($supplierWallet, $transactionData)->responeHandle();
        return redirect()->back()->with('message', $message);
    }
    public function paymentOut(Request $request, walletService $walletService)
    {
        $userWallet = UserWallet::where('user_id',1)->first();
        $supplierWallet = SupplierWallet::where('supplier_id',11)->first();
        $transactionData = [
            'model_type' => 'Models\Sale',
            'model_id' => 6,
            'date'=>date('Y-m-d H:i:s'),
            'amount' => $request->amount
        ];
        $message = $walletService->paymentOut($userWallet, $transactionData,$supplierWallet)->responeHandle();
        return redirect()->back()->with('message', $message);
    }

    public function paymentIn(Request $request, walletService $walletService)
    {
        $userWallet = UserWallet::where('user_id',1)->first();
        $clientWallet = ClientWallet::where('client_id',1)->first();
        $transactionData = [
            'model_type' => 'Models\Sale',
            'model_id' => 6,
            'date'=>date('Y-m-d H:i:s'),
            'amount' => $request->amount
        ];
        $message = $walletService->paymentIn($userWallet, $transactionData,$clientWallet)->responeHandle();
        return redirect()->back()->with('message', $message);
    }
}
