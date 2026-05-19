<?php

namespace App\Providers;

use App\Domain\Domain\Repositories\DomainCheckLogRepositoryInterface;
use App\Domain\Domain\Repositories\DomainRepositoryInterface;
use App\Domain\Domain\Repositories\EloquentDomainCheckLogRepository;
use App\Domain\Domain\Repositories\EloquentDomainRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            DomainRepositoryInterface::class,
            EloquentDomainRepository::class
        );

        $this->app->bind(
            DomainCheckLogRepositoryInterface::class,
            EloquentDomainCheckLogRepository::class
        );
    }

    public function boot(): void
    {
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }
}