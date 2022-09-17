
<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Clients\Http\Controllers\ClientController;
use Clients\Http\Controllers\ClientWalletController;
use Clients\Http\Controllers\ClientWalletTransactionController;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale().'/'.config('module.Clients'),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','web','auth','verified','firstRegisteration']

    ],
    function () {

        Route::resource('clients',   ClientController::class)->parameters(['clients' => 'client:slug']);
        Route::get('client-wallet', [ClientWalletController::class, 'index'])->name('get.client.wallet');
        Route::get('show-client-wallet-transactions/{clientwallet:slug}', [ClientWalletTransactionController::class, 'show'])->name('show.client.wallet.trans');
        Route::get('create-client-wallet-transactions/{clientwallet:slug}', [ClientWalletTransactionController::class, 'create'])->name('create.wallet.trans');
        Route::post('store-client-wallet-transactions/{clientwallet:slug}', [ClientWalletTransactionController::class, 'store'])->name('store.wallet.trans');
        Route::delete('destroy-client-wallet-transactions/{ClientWalletTransaction:id}', [ClientWalletTransactionController::class, 'destroy'])->name('destroy.wallet.trans');
        Route::resource('client-wallet-transactions', ClientWalletTransactionController::class)->parameters(['client_wallet' => 'client_wallet:id']);
        Route::get('datatables',[ClientController::class,'clientData'])->name('client.data');
        Route::get('client-walletdatatables',[ClientWalletController::class,'clientWalletData'])->name('clientWallet.data');
        Route::get('client-wallet-transdatatables/{clientwallet:slug}',[ClientWalletTransactionController::class,'clientWalletTransData'])->name('clientWalletTrans.data');



    });


















?>
