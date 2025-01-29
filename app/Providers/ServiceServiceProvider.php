<?php

namespace App\Providers;

use App\Services\Cidade\CidadeService;
use App\Services\Cidade\CidadeServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(CidadeServiceInterface::class, CidadeService::class);
    }

    public function provides()
    {
        return [
            UserServiceInterface::class,
            CidadeServiceInterface::class,
        ];
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
