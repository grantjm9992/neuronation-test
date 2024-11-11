<?php

declare(strict_types=1);

namespace App\Providers;

use app\Domain\Models\User;
use app\Domain\Repositories\DomainCategoryRepositoryInterface;
use app\Domain\Repositories\SessionRepositoryInterface;
use app\Infrastructure\Repositories\DomainCategoryRepository;
use app\Infrastructure\Repositories\SessionRepository;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            abstract: SessionRepositoryInterface::class,
            concrete: SessionRepository::class
        );
        $this->app->singleton(
            abstract: DomainCategoryRepositoryInterface::class,
            concrete: DomainCategoryRepository::class
        );
    }

    public function provides(): array
    {
        return [
            SessionRepositoryInterface::class,
            DomainCategoryRepositoryInterface::class,
        ];
    }

    public function boot(): void
    {
        Cashier::useCustomerModel(User::class);
    }
}
