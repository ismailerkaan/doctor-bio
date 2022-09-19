<?php

namespace App\Providers;

use App\Models\Doctor;
use App\Observers\DoctorObserver;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Doctor::observe(DoctorObserver::class);
    }
}
