<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Policies\EntityEtlPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\EntityEtl;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        EntityEtl::class => EntityEtlPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
