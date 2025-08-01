<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
=======
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    public function register(): void
    {
        //
    }

<<<<<<< HEAD
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
=======
    public function boot(): void
    {
        Schema::defaultStringLength(191);
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    }
}
