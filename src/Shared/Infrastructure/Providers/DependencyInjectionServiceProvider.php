<?php

namespace Src\Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Src\BoundedContext\Backend\Infrastructure\Persistence\Repositories\EntityEtlEloquentRepository;
use Src\BoundedContext\Backend\Infrastructure\Persistence\Repositories\ProductEloquentRepository;
use Src\BoundedContext\Backend\Infrastructure\Persistence\Repositories\UserEloquentRepository;
use Src\BoundedContext\Shared\Domain\Contracts\Repositories\EntityEtlRepository;
use Src\BoundedContext\Shared\Domain\Contracts\Repositories\ProductRepository;
use Src\BoundedContext\Shared\Domain\Contracts\Repositories\UserRepository;

class DependencyInjectionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(EntityEtlRepository::class, function () {
            return new EntityEtlEloquentRepository;
        });
        $this->app->bind(ProductRepository::class, function () {
            return new ProductEloquentRepository;
        });
        $this->app->bind(UserRepository::class, function () {
            return new UserEloquentRepository;
        });
    }
}
