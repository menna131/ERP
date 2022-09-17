<?php

namespace Clients\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
class ClientsServiceProvider extends ServiceProvider
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

        $ds = DIRECTORY_SEPARATOR;
        $moduleName = config('module.Clients');
        config(['module'=>File::getRequire(base_path($ds.'config'.$ds.'module.php'))]);
        $this->loadRoutesFrom(__DIR__.$ds.'..'.$ds.'routes'.$ds.'web.php');
        $this->loadViewsFrom(__DIR__.$ds.'..'.$ds.'resources'.$ds.'views',$moduleName);
        $this->loadTranslationsFrom(__DIR__.$ds.'..'.$ds.'resources'.$ds.'lang',$moduleName);
        $this->loadMigrationsFrom(__DIR__.$ds.'..'.$ds.'database'.$ds.'migrations');
       

    }
}
