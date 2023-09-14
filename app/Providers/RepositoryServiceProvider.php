<?php

namespace App\Providers;

// CONTRACTS
use App\Contracts\RoleContract;
use App\Contracts\UserContract;
use App\Contracts\RepresentativeContract;
use App\Contracts\CompanyContract;
use App\Contracts\DistributorContract;
use App\Contracts\DrugClassContract;
use App\Contracts\ClassificationContract;
use App\Contracts\ProductContract;
use App\Contracts\FormContract;
use App\Contracts\CategoryContract;

// REPOSITORY
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Repositories\RepresentativeRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\DistributorRepository;
use App\Repositories\DrugClassRepository;
use App\Repositories\ClassificationRepository;
use App\Repositories\ProductRepository;
use App\Repositories\FormRepository;
use App\Repositories\CategoryRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        UserContract::class => UserRepository::class,
        RoleContract::class => RoleRepository::class,
        RepresentativeContract::class => RepresentativeRepository::class,
        CompanyContract::class => CompanyRepository::class,
        DistributorContract::class => DistributorRepository::class,
        DrugClassContract::class => DrugClassRepository::class,
        ClassificationContract::class => ClassificationRepository::class,
        ProductContract::class => ProductRepository::class,
        FormContract::class => FormRepository::class,
        CategoryContract::class => CategoryRepository::class,
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
