<?php

namespace Stocks\Http\Controllers\installments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class installmentController extends Controller
{
    //
    public function  index(){
        return view('stocks::installments.index');
    }
}
