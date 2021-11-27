<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\ListService;
use App\Services\PageService;
use App\Services\TaskService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ListService::class, function($app) {
            return new PageService();
        }); 
        
        $this->app->bind(TaskService::class, function($app) {
            return new TaskService();
        });

        $this->app->bind(PageService::class, function($app) {
            return new PageService();
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
