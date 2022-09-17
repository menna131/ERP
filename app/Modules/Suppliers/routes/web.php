<?php

use Illuminate\Support\Facades\Route;
use Suppliers\Http\Controllers\SupplierController;
use Suppliers\Http\Controllers\PriceListController;
use Suppliers\Http\Controllers\testWalletController;
use Suppliers\Http\Controllers\SupplierWalletController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Suppliers\Http\Controllers\SupplierWalletTransactionController;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale().'/'.config('module.Suppliers'),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','web','auth','verified','firstRegisteration']
    ],
    function () { //...
            Route::resource('suppliers', SupplierController::class)->parameters(['suppliers' => 'supplier:slug']); //
            Route::get('supplier-wallet', [SupplierWalletController::class, 'index'])->name('get.supplier.wallet');
            Route::get('show-supplier-wallet-transactions/{SupplierWallet:slug}', [SupplierWalletTransactionController::class, 'show'])->name('show.supplier.wallet.trans');
            Route::get('create-supplier-wallet-transactions/{SupplierWallet:slug}', [SupplierWalletTransactionController::class, 'create'])->name('create.supplier.wallet.trans');
            Route::post('store-supplier-wallet-transactions/{SupplierWallet:slug}', [SupplierWalletTransactionController::class, 'store'])->name('store.supplier.wallet.trans');
            Route::delete('destroy-supplier-wallet-transactions/{SupplierWalletTransaction:id}', [SupplierWalletTransactionController::class, 'destroy'])->name('destroy.supplier.wallet.trans');
            Route::get('supplier-wallet-transactions/{suppplier}', [SupplierWalletController::class, 'getSupplierWalletTrans'])->name('get.supplier.wallet.trans');
            Route::resource('supplier-wallet-transactions', SupplierWalletTransactionController::class);
            Route::get('datatables',[SupplierController::class,'suppllierData'])->name('suppllier.data');
            Route::resource('suppliers.pricelists', priceListController::class)->parameters(['suppliers' => 'supplier:slug','pricelists' => 'pricelist:slug']);
            Route::get('pricelist-datatables/{supplier_id}',[priceListController::class,'priceListData'])->name('priceList.data');
            Route::get('supplier-walletdatatables',[SupplierWalletController::class,'supplierWalletData'])->name('supplierwallet.data');
            Route::get('supplier-wallet-transdatatables/{SupplierWallet:slug}',[SupplierWalletTransactionController::class,'supplierWalletTransData'])->name('supplierWalletTrans.data');
           
            /* test wallet */
            Route::get('wallet-test', [testWalletController::class,'walletTest']);
            route::post('deposite',[testWalletController::class,'deposite'])->name('deposite');
            route::post('debit',[testWalletController::class,'debit'])->name('debit');
            route::post('withdraw',[testWalletController::class,'withdraw'])->name('withdraw');
            route::post('paymentOut',[testWalletController::class,'paymentOut'])->name('paymentOut');
            route::post('paymentIn',[testWalletController::class,'paymentIn'])->name('paymentIn');

    });


