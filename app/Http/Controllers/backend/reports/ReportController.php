<?php

namespace App\Http\Controllers\backend\reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function getMostSaleProduct(){
        return view('backend.reports.mostSaleProducts');
    }

    public function getMonthProfit(){
        return view('backend.reports.monthProfit');
    }

    public function getTotalCapital(){
        return view('backend.reports.totalCapital');
    }

    public function  getBestCustomers(){
        return view('backend.reports.bestCustomers');
    }

    public function  getBestSuppliers(){
        return view('backend.reports.bestSuppliers');
    }

    public function  getFrequentCustomers(){
        return view('backend.reports.frequentCustomers');
    }
    public function  getFrequentSuppliers(){
        return view('backend.reports.frequentSuppliers');
    }
    public function  getInstallmentAndSales(){
        return view('backend.reports.installmentAndSales');
    }
    public function  getInstallmentsAndPurchases(){
        return view('backend.reports.installmentsAndPurchases');
    }
    public function  getReceivablesAndPayments(){
        return view('backend.reports.receivablesAndPayments');
    }


   
}

