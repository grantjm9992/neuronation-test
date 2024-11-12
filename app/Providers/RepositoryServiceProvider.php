<?php

namespace App\Providers;

use App\Domain\Repositories\DomainCategoryRepositoryInterface;
use App\Domain\Repositories\SessionRepositoryInterface;
use App\Domain\Repositories\UserRepositoryInterface;
use App\Infrastructure\Repositories\DomainCategoryRepository;
use App\Infrastructure\Repositories\SessionRepository;
use App\Infrastructure\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            abstract: SessionRepositoryInterface::class,
            concrete: SessionRepository::class
        );
        $this->app->singleton(
            abstract: DomainCategoryRepositoryInterface::class,
            concrete: DomainCategoryRepository::class
        );;
        $this->app->singleton(
            abstract: UserRepositoryInterface::class,
            concrete: UserRepository::class
        );
    }

    public function provides(): array
    {
        return [
            SessionRepositoryInterface::class,
            DomainCategoryRepositoryInterface::class,
            UserRepositoryInterface::class,
        ];
    }
}
