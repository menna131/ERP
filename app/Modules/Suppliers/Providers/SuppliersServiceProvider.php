<?php

namespace Suppliers\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Suppliers\Models\Supplier;

class SuppliersServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // Supplier::create(['test']);
        // dd('ok');
        $ds = DIRECTORY_SEPARATOR;
        $moduleName ='Suppliers';
        // $moduleName = config('module.Suppliers');
        config(['module'=>File::getRequire(base_path($ds.'config'.$ds.'module.php'))]); // register your moduleName in App\config\module.php =>
        $this->loadRoutesFrom(__DIR__.$ds.'..'.$ds.'routes'.$ds.'web.php'); //load your routes =>

        $this->loadViewsFrom(__DIR__.$ds.'..'.$ds.'resources'.$ds.'views',$moduleName);

        $this->loadTranslationsFrom(__DIR__.$ds.'..'.$ds.'resources'.$ds.'lang',$moduleName);

        $this->loadMigrationsFrom(__DIR__.$ds.'..'.$ds.'database'.$ds.'migrations');

    }
}
