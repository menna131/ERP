<?php

namespace App\Http\Controllers\backend\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('backend.index.index');
    }
}
