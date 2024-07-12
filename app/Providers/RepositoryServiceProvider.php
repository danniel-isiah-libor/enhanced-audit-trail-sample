<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\ExceptionRepositoryInterface;
use App\Repositories\Contracts\QueryRepositoryInterface;
use App\Repositories\Contracts\RequestRepositoryInterface;
use App\Repositories\ExceptionRepository;
use App\Repositories\QueryRepository;
use App\Repositories\RequestRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RequestRepositoryInterface::class, RequestRepository::class);
        $this->app->bind(ExceptionRepositoryInterface::class, ExceptionRepository::class);
        $this->app->bind(QueryRepositoryInterface::class, QueryRepository::class);
    }
}
