<?php

namespace Smdm\SaasCrm;

use Smdm\SaasCrm\Commands\SaasCrmCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SaasCrmServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('saas-crm')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_saas_crm_access_table')
            ->hasCommand(SaasCrmCommand::class);
    }
}
