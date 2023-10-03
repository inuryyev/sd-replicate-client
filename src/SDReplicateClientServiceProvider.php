<?php

namespace INuryyev\SDReplicateClient;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SDReplicateClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('sd-replicate-client')
            ->hasConfigFile('sd-replicate-client')
            ->hasMigration('create_stable_diffusion_predictions_table');
    }
}
