<?php

namespace App\Providers;

use App\Repositories\CidadeRepositoryInterface;
use App\Repositories\Eloquent\CidadeRepository;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CidadeRepositoryInterface::class, CidadeRepository::class);
    }

    public function provides()
    {
        return [
            UserRepositoryInterface::class,
            CidadeRepositoryInterface::class,
        ];
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
