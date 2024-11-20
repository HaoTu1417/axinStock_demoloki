<?php

namespace App\Providers;

use Carbon\Laravel\ServiceProvider;

class CustomAssetProvider extends ServiceProvider
{
    public function register()
    {
    }
    public function boot()
    {
        view()->composer('*', function ($view) {
            $link = 'public';
            $version = strtotime('YmdHis');
            $view->with([
                'link' => $link,
                'ver' => $version
            ]);
        });
    }
}
