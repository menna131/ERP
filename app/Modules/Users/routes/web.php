<?php

use App\Http\Controllers\backend\index\IndexController;
use App\Http\Controllers\HomeController;
use Users\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Users\Http\Controllers\UserController;
use Users\Http\Controllers\UserWalletController;
use Users\Http\Controllers\UserWalletTransactionController;
use Users\Http\Controllers\RoleController;
use Users\Http\Controllers\PermissionController;
use Users\Models\Setting;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','web']
    ],
    function () {
        Auth::routes(['verify' => true, 'register' => (boolean)config('first_register')]);
        Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['verified','firstRegisteration']);
        Route::get('/', [IndexController::class, 'index'])->middleware('guest');

        Route::group([
                'prefix' => config('module.Users'),
                'middleware' => ['verified','firstRegisteration']
            ], function(){
                        Route::get('user-wallet/create', [UserWalletController::class, 'create'])->name('user.wallet.create');
                        Route::post('user-wallet/store', [UserWalletController::class, 'store'])->name('user.wallet.store');
                        // settings
                        Route::get('general-settings', [SettingController::class, 'generalSettings'])->name('general.settings');
                        Route::get('settings/',[SettingController::class, 'selectSettings'])->name('settings');
                        Route::post('settings-store/',[SettingController::class, 'storeSelectSettings'])->name('settings.store');
                        Route::get('opening-stock/',[SettingController::class, 'openingStock'])->name('opening.stock');
                        Route::post('opening-stock/store',[SettingController::class, 'OpeningStockStore'])->name('opening.stock.store');
                        // users
                        Route::resource('users', UserController::class)->parameters(['users' => 'user:slug']);
                        Route::get('profile/{user:slug}', [UserController::class, 'profileEdit'])->name('profile.edit');
                        Route::put('profile/{user:slug}', [UserController::class, 'profileUpdate'])->name('profile.update');
                        Route::put('profile-email/{user:slug}', [UserController::class, 'profileEmail'])->name('profile.email');
                        // link to update user's email
                        Route::get('user-update-email', [UserController::class, 'linkToUpdateUserEmail'])->name('link.update.user.email')->middleware('signed');
                        Route::put('profile-password', [UserController::class, 'profilePassword'])->name('profile.password');
                        // user wallet
                        Route::get('datatables',[UserController::class,'userData'])->name('user.data');
                        Route::get('user-walletdatatables',[UserWalletController::class,'userWalletData'])->name('userwallet.data');
                        Route::get('user-wallet/{user:slug}', [UserWalletController::class, 'index'])->name('get.user.wallet');
                        // wallet transactions
                        Route::get('user-wallet-transaction', [UserWalletTransactionController::class, 'index'])->name('show.user.wallet.trans');
                        Route::get('user-wallet-transdatatables',[UserWalletTransactionController::class,'userWalletTransData'])->name('userwalletTrans.data');
                        // roles
                        Route::resource('roles', RoleController::class)->parameters(['roles' => 'role:slug']);
                        Route::prefix('users/roles')->group(function () {
                            Route::get('datatables',[RoleController::class,'roleData'])->name('roles.data');
                        });
                        // permissions
                        Route::resource('permissions', PermissionController::class)->parameters(['permissions' => 'permission:slug']);
                        Route::prefix('users/permissions')->group(function () {
                            Route::get('datatables',[PermissionController::class,'permissionData'])->name('permission.data');
                        });
        });
});