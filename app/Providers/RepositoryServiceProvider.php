<?php

namespace App\Providers;

use App\Contracts\ResturantContract;
use App\Contracts\MealContract;
use App\Contracts\LoginContract;

use App\Repositories\ResturantRepository;
use App\Repositories\MealRepository;
use App\Repositories\LoginRepository;

use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ResturantContract::class, ResturantRepository::class);
        $this->app->bind(MealContract::class, MealRepository::class);
        $this->app->bind(LoginContract::class, LoginRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
