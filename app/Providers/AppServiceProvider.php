<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param ViewFactory $view
     * @return void
     */
    public function boot(ViewFactory $view)
    {
        Schema::defaultStringLength(191);

        $view->composer('*', function ($view) {
            $user_options = Redis::hgetall('user.'.auth()->id().'.options');

            $view->with('user_options', $user_options);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Carbon::setLocale(config('app.locale'));
    }
}
