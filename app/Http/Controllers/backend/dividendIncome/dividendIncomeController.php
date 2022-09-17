<?php

namespace App\Http\Controllers\backend\dividendIncome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dividendIncomeController extends Controller
{
    public function dividendIncome()
    {
        return view('backend.dividendIncome.dividend-income');
    }
    public function dividendIncomeDetails()
    {
        return view('backend.dividendIncome.dividend-income-details');
    }
}
