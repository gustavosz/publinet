<?php

namespace App\Providers;

use App\Repositories\CompanyRepository;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Repositories\Contracts\DisplayRepositoryInterface;
use App\Repositories\Contracts\PhotoRepositoryInterface;
use App\Repositories\DisplayRepository;
use App\Repositories\PhotoRepository;
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
        $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
        $this->app->bind(DisplayRepositoryInterface::class, DisplayRepository::class);
        $this->app->bind(PhotoRepositoryInterface::class, PhotoRepository::class);
    }
}
