<?php

namespace Src\Shared\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Src\BoundedContext\Shared\Infrastructure\Events\DispatchEtlForTenantFailureEvent;
use Src\BoundedContext\Shared\Infrastructure\Listeners\DispatchEtlForTenantFailureListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        DispatchEtlForTenantFailureEvent::class => [
            DispatchEtlForTenantFailureListener::class
        ],
    ];

    public function register(): void
    {

    }

    public function boot(): void
    {
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
