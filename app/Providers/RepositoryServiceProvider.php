<?php

namespace App\Providers;

// CONTRACTS
use App\Contracts\RoleContract;
use App\Contracts\UserContract;
use App\Contracts\RepresentativeContract;

// REPOSITORY
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Repositories\RepresentativeRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        UserContract::class => UserRepository::class,
        RoleContract::class => RoleRepository::class,
        RepresentativeContract::class => RepresentativeRepository::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        foreach($this->repositories as $contract => $repository) {
            $this->app->singleton($contract,$repository);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
