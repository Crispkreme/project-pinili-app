<?php

namespace App\Providers;

// CONTRACTS
use App\Contracts\RoleContract;
use App\Contracts\UserContract;

// REPOSITORY
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        UserContract::class => UserRepository::class,
        RoleContract::class => RoleRepository::class,
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
