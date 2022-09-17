<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Users\Models\Role;
use Users\Models\Setting;

class firstRegisteration
{
    private const emailVerifiedStage = 2;
    private const walletStage = 3;
    private const openingStockStage = 4;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $superAdmin = Role::first();
        if(!empty($superAdmin) && $superAdmin->name == 'Super Admin'){
            $setting = Setting::first();
            if(!empty($setting) && $setting->status == self::emailVerifiedStage && ! in_array($request->route()->getName() ,['user.wallet.create','user.wallet.store'])){
                return redirect()->route('user.wallet.create');
            }
            if(!empty($setting) && $setting->status == self::walletStage &&  ! in_array($request->route()->getName() ,['settings','settings.store'])){
                return redirect()->route('settings');  
            }   
            if(!empty($setting) && $setting->status == self::openingStockStage &&  ! in_array($request->route()->getName() ,['opening.stock','opening.stock.store'])){
                return redirect()->route('opening.stock');  
            }     
            
        }else{
            if(! in_array($request->route()->getName() ,['home'])){
               return redirect()->route('home'); 
            }
            
        }
        return $next($request);
    }
}