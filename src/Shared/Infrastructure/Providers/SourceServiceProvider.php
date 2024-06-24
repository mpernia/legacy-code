<?php

namespace Src\Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

class SourceServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        $migrationPath = sharedPath('Infrastructure/Database/Migrations/');
        $seederPath = sharedPath('Infrastructure/Database/Seeders/DatabaseSeeder.php');
        $factoriesPath = sharedPath('Infrastructure/Database/Factories');
        $configPath = sharedPath('Infrastructure/Config/setting.php');
        $assetsPath = sharedPathOnBoundedContext('Infrastructure/Resources/assets');
        $languagePath = sharedPathOnBoundedContext('Infrastructure/Resources/lang');

        $this->publishes([$seederPath => database_path('seeders/DatabaseSeeder.php')], 'legacy.Seeders');
        $this->publishes([$factoriesPath => database_path('factories')], 'legacy.factories');
        $this->publishes([$configPath => config_path('setting.php')], 'legacy.config');

        $this->loadMigrationsFrom($migrationPath);
        $this->mergeConfigFrom($configPath, 'marketplace');

        $this->commands([]);
    }
}
