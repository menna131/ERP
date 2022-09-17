<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;
use Users\Models\Role;
use Users\Models\Setting;
use Users\Models\User;

class VerificationController extends Controller
{
    private const emailVerified = 2;

    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
        return view('auth.verify');
    }
    protected function verified()
    {
        $role = Role::where('name','Super Admin')->first();
        if(is_null($role)){
            Setting::first()->update(['status' => self::emailVerified]);
            $role  = Role::create(['name'=>'Super Admin']);
            Auth::user()->assignRole($role->id);
        }
    }
}