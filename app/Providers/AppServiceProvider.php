<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Encore\Admin\Config\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Reply::observe(\App\Observers\ReplyObserver::class);
		\App\Models\Topic::observe(\App\Observers\TopicObserver::class);
        \App\Models\Link::observe(\App\Observers\LinkObserver::class);

        //
        \Carbon\Carbon::setLocale('zh');

        Config::load();  // Add this
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        

        //
        if (app()->isLocal()) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }

        

        
        
    }
}