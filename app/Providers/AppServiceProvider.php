<?php

namespace App\Providers;

use App\Model\Notification;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('*', function($view) {
            if(auth()->user()){
                $view->with(['user'=> auth()->user(),
                    'notifications'=> Notification::list(auth()->user()->id),
                    'notification_count'=> Notification::count(auth()->user()->id)
                ]);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
