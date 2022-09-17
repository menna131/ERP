<?php
use Illuminate\Support\Facades\Route;
use Stocks\Http\Controllers\expenses\ExpenseController;
use Stocks\Http\Controllers\expensesTypes\ExpenseTypeController;
use Stocks\Http\Controllers\installments\installmentController;
use Stocks\Http\Controllers\products\ProductController;
use Stocks\Http\Controllers\purchaseOrders\PurchaseOrderController;
use Stocks\Http\Controllers\sales\SaleController;
use Stocks\Http\Controllers\purchases\PurchaseController;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
//test hmvc
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale().'/'.config('module.Stocks'),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','web','verified','firstRegisteration']
    ],
    function () {


        // expenses
        Route::resource('expenses', ExpenseController::class)->parameters(['expenses' => 'expense:slug']);
        Route::get('expenseTables',[ExpenseController::class,'expenseData'])->name('expense.data');
        // expenses types
        Route::resource('expensesTypes', ExpenseTypeController::class)->parameters(['expensesTypes' => 'expenseType:slug']);
        Route::get('expenseTypeTables',[ExpenseTypeController::class,'expenseTypeData'])->name('expenseType.data');

        // products || stock
        Route::resource('products', ProductController::class);
        Route::get('products/history/{id}', [ProductController::class, 'history'])->name('products.history');

        //Sales
        Route::resource('sales', SaleController::class);
        Route::get('get-pre-sale', [SaleController::class, 'PreSale'])->name('pre.sale');

        //livewire sales
        // Route::livewire('livewire/sales','sales');
        // Route::get('livewire/sales' , App\Http\Livewire\Sales::class);

        // Purchases
        Route::resource('purchases', PurchaseController::class);
        // installments
        Route::get('installments', [installmentController::class, 'index'])->name('installments.index');
        //PurchasesOrder
        Route::resource('purchasesOrder', PurchaseOrderController::class);



    });

    Route::post('show-req',[SaleController::class,'showReq'])->name('show.req');
