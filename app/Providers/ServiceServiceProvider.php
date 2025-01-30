<?php

namespace App\Providers;

use App\Services\Cidade\CidadeService;
use App\Services\Cidade\CidadeServiceInterface;
use App\Services\Medico\MedicoService;
use App\Services\Medico\MedicoServiceInterface;
use App\Services\Paciente\PacienteService;
use App\Services\Paciente\PacienteServiceInterface;
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
        $this->app->bind(MedicoServiceInterface::class, MedicoService::class);
        $this->app->bind(PacienteServiceInterface::class, PacienteService::class);
    }

    public function provides()
    {
        return [
            UserServiceInterface::class,
            CidadeServiceInterface::class,
            MedicoServiceInterface::class,
            PacienteServiceInterface::class,
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
