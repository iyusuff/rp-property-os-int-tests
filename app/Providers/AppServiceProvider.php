<?php

namespace App\Providers;

use App\Repositories\Property\PropertyRepository;
use App\Repositories\Property\PropertyRepositoryInterface;
use App\Repositories\PropertyInstance\PropertyInstanceRepository;
use App\Repositories\PropertyInstance\PropertyInstanceRepositoryInterface;
use App\Repositories\PropertySearch\PropertySearchRepository;
use App\Repositories\PropertySearch\PropertySearchRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\PropertyType\PropertyTypeRepository;
use App\Repositories\PropertyType\PropertyTypeRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // send logs to stdout
        $logger = $this->app->make(\Psr\Log\LoggerInterface::class);
        $logger->popHandler();
        $logger->pushHandler(new \Monolog\Handler\ErrorLogHandler());

        $this->app->bind(PropertyTypeRepositoryInterface::class, PropertyTypeRepository::class);
        $this->app->bind(PropertyRepositoryInterface::class, PropertyRepository::class);
        $this->app->bind(PropertyInstanceRepositoryInterface::class, PropertyInstanceRepository::class);
        $this->app->bind(PropertySearchRepositoryInterface::class, PropertySearchRepository::class);
    }
}
