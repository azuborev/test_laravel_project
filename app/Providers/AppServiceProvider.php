<?php

namespace App\Providers;

use App\Services\Api\GitHubApi;
use App\Services\Api\Interfaces\WordSearchApiProxy;
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
        $this->app->singleton(WordSearchApiProxy::class, GitHubApi::class);
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
