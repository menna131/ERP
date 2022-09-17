<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Clients\Http\Controllers\ClientController;
use Stocks\Http\Controllers\sales\SaleController;
use Suppliers\Http\Controllers\SupplierController;






Route::get('store-client',[ClientController::class,'store'])->name('store.client');
Route::get('get-suppliers-options',[SaleController::class,'getSuppliersOptions'])->name('get.suppliers.options');
Route::get('create-sale',[SaleController::class,'create'])->name('create.sale');

Route::get('store-supplier',[SupplierController::class,'store'])->name('store.supplier');
// Route::get('create-sale',[SaleController::class,'create'])->name('create.sale');

