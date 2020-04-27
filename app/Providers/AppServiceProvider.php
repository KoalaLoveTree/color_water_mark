<?php

namespace App\Providers;

use App\Models\PrimaryColorDetector;
use App\Models\WaterMarker;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('water_marker', function($app)
        {
            return new WaterMarker();
        });

        App::bind('color_detector', function($app)
        {
            return new PrimaryColorDetector();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
