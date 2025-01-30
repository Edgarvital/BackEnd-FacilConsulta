<?php

namespace App\Providers;

use App\Repositories\CidadeRepositoryInterface;
use App\Repositories\ConsultaRepositoryInterface;
use App\Repositories\Eloquent\CidadeRepository;
use App\Repositories\Eloquent\ConsultaRepository;
use App\Repositories\Eloquent\MedicoRepository;
use App\Repositories\Eloquent\PacienteRepository;
use App\Repositories\MedicoRepositoryInterface;
use App\Repositories\PacienteRepositoryInterface;
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
        $this->app->bind(MedicoRepositoryInterface::class, MedicoRepository::class);
        $this->app->bind(ConsultaRepositoryInterface::class, ConsultaRepository::class);
        $this->app->bind(PacienteRepositoryInterface::class, PacienteRepository::class);
    }

    public function provides()
    {
        return [
            UserRepositoryInterface::class,
            CidadeRepositoryInterface::class,
            MedicoRepositoryInterface::class,
            ConsultaRepositoryInterface::class,
            PacienteRepositoryInterface::class,
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
