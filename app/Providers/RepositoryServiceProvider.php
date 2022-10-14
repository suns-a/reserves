<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Reserve\ReserveRepositoryInterface;
use App\Repositories\Reserve\ReserveRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ReserveRepositoryInterface::class, ReserveRepository::class);
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
