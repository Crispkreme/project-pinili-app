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
use App\Contracts\OrderContract;
use App\Contracts\StatusContract;
use App\Contracts\InventoryContract;
use App\Contracts\InventorySheetContract;
use App\Contracts\InventoryDetailContract;
use App\Contracts\InventoryPaymentContract;
use App\Contracts\InventoryPaymentDetailContract;
use App\Contracts\EntityContract;

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
use App\Repositories\OrderRepository;
use App\Repositories\StatusRepository;
use App\Repositories\InventoryRepository;
use App\Repositories\InventorySheetRepository;
use App\Repositories\InventoryDetailRepository;
use App\Repositories\InventoryPaymentRepository;
use App\Repositories\InventoryPaymentDetailRepository;
use App\Repositories\EntityRepository;

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
        OrderContract::class => OrderRepository::class,
        StatusContract::class => StatusRepository::class,
        InventoryContract::class => InventoryRepository::class,
        InventorySheetContract::class => InventorySheetRepository::class,
        InventoryDetailContract::class => InventoryDetailRepository::class,
        InventoryPaymentContract::class => InventoryPaymentRepository::class,
        InventoryPaymentDetailContract::class => InventoryPaymentDetailRepository::class,
        EntityContract::class => EntityRepository::class,
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
