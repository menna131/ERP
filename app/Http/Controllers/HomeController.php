<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Users\Models\Setting;

class HomeController extends Controller
{
    private const adminTotallyVerified = 1;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.dashboard.dashboard');

    }
    public function switchMode (Request $request)
    {
        if($request->mode == 'Light')
            $newMode = 'Dark';
        else
            $newMode = 'Light';
        Session()->put('mode',$newMode );
        return redirect()->back();
    }
}
