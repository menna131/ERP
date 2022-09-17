<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Users\Http\Controllers\RoleController;
use Users\Http\Controllers\PermissionController;
use App\Http\Controllers\backend\sales\SaleController;
use App\Http\Controllers\backend\index\IndexController;
use App\Http\Controllers\backend\brands\BrandController;
use App\Http\Controllers\backend\reports\ReportController;
use App\Http\Controllers\backend\clientss\ClientController;
use App\Http\Controllers\backend\website\WebsiteController;
use App\Http\Controllers\backend\expenses\ExpenseController;
use App\Http\Controllers\backend\partners\partnerController;
use App\Http\Controllers\backend\products\ProductController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\backend\purchases\PurchaseController;
use App\Http\Controllers\backend\categories\CategoryController;
use App\Http\Controllers\backend\installments\installmentController;
use App\Http\Controllers\backend\ClientWallet\ClientWalletController;
use App\Http\Controllers\backend\expensesTypes\ExpenseTypeController;
use App\Http\Controllers\backend\notifications\NotificationController;
use App\Http\Controllers\backend\purchaseOrders\PurchaseOrderController;
use App\Http\Controllers\backend\dividendIncome\dividendIncomeController;
use App\Http\Controllers\backend\ClientWalletTransactions\ClientWalletTransactionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::livewire('livewire/purchases','Purchases');



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () { //...

        Route::get('test',function(){
            return view ('test');
        });
        // authentication routes
        Route::group(['middleware' => 'auth'], function () {

            // brands
            Route::resource('brands', BrandController::class)->parameters(['brands' => 'brand:slug']);
            Route::get('brandtables',[BrandController::class,'brandData'])->name('brand.data');
            // categories
            Route::resource('categories', CategoryController::class)->parameters(['categories' => 'category:slug']);
            Route::get('categorytables',[CategoryController::class,'categoryData'])->name('category.data');

            // roles
            Route::resource('roles', RoleController::class);
            // permissions
            Route::resource('permissions', PermissionController::class);
            Route::delete('destroy-all', [PermissionController::class, 'destroyAll'])->name('permissions.destroy.all');
            // Reports
            Route::get('most-sale-product', [ReportController::class, 'getMostSaleProduct'])->name('most-sold-products');
            Route::get('total-capital', [ReportController::class, 'getTotalCapital'])->name('total-capital');
            Route::get('month-profit', [ReportController::class, 'getMonthProfit'])->name('monthly-profits');
            Route::get('best-customers', [ReportController::class, 'getBestCustomers'])->name('best-customers');
            Route::get('best-suppliers', [ReportController::class, 'getBestSuppliers'])->name('best-suppliers');
            Route::get('frequent-customers', [ReportController::class, 'getFrequentCustomers'])->name('frequent-customers');
            Route::get('frequent-suppliers', [ReportController::class, 'getFrequentSuppliers'])->name('frequent-suppliers');
            Route::get('installments-and-sales', [ReportController::class, 'getInstallmentAndSales'])->name('Installments-and-sales');
            Route::get('installments-and-purchases', [ReportController::class, 'getInstallmentsAndPurchases'])->name('installments-and-purchases');
            Route::get('receivables-and-payments', [ReportController::class, 'getReceivablesAndPayments'])->name('receivables-and-payments');
            // dividend income
            Route::get('dividend-income',[dividendIncomeController::class,'dividendIncome'])->name('dividend-income');
            Route::get('dividend-income-details-{id}',[dividendIncomeController::class,'dividendIncomeDetails'])->name('dividend-income-details');
            //partners
            Route::resource('partners',partnerController::class);
            //switch mode
            Route::post('switch-mode',[HomeController::class, 'switchMode'])->name('switch-mode');



           //notifications
           Route::resource('notifications', NotificationController::class);

            // //test hmvc
            // Route::get('test',[testController::class,'test']);

        });
    }
);
