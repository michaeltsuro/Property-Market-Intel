<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ProjectRepositoryInterface;
use App\Repositories\ProjectRepository;
use App\Repositories\BuildingSpecificationRepository;
use App\Interfaces\BuildingRepositoryInterface;
use App\Repositories\PropertyImageRepository;
use App\Interfaces\PropertyImageRepositoryInterface;
use App\Repositories\LandRepository;
use App\Interfaces\LandRepositoryInterface;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //bind
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(BuildingRepositoryInterface::class, BuildingSpecificationRepository::class);
        $this->app->bind(PropertyImageRepositoryInterface::class, PropertyImageRepository::class);
        $this->app->bind(LandRepositoryInterface::class, LandRepository::class);
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
