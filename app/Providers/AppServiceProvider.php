<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        if(!app()->runningInConsole()){
            $setting=Setting::firstOr(function(){

                return Setting::create([
                    'name'=>'siteName',
                    'description'=>'laravel'
                ]);
            });
            // dd($setting,$setting->id);
            view()->share('setting',$setting);
        }
    }
}
