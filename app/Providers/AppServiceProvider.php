<?php

declare(strict_types=1);

namespace App\Providers;

use App\Application\Services\Auth\Login\LogInWithCredentialsService;
use App\Application\Services\Auth\Login\LogInWithCredentialsServiceInterface;
use App\Application\Services\Auth\Login\LoginWithUserService;
use App\Application\Services\Auth\Login\LoginWithUserServiceInterface;
use App\Application\Services\Auth\Password\PasswordHash;
use App\Application\Services\Auth\Password\PasswordHashInterface;
use App\Application\Services\Auth\Register\RegisterUserService;
use App\Application\Services\Auth\Register\RegisterUserServiceInterface;
use App\Application\Services\Auth\Session\GetLoggedInUserService;
use App\Application\Services\Auth\Session\GetLoggedInUserServiceInterface;
use App\Domain\Models\User;
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
            abstract: GetLoggedInUserServiceInterface::class,
            concrete: GetLoggedInUserService::class,
        );
        $this->app->singleton(
            abstract: LogInWithCredentialsServiceInterface::class,
            concrete: LogInWithCredentialsService::class,
        );
        $this->app->singleton(
            abstract: LoginWithUserServiceInterface::class,
            concrete: LoginWithUserService::class,
        );
        $this->app->singleton(
            abstract: RegisterUserServiceInterface::class,
            concrete: RegisterUserService::class,
        );
        $this->app->singleton(
            abstract: PasswordHashInterface::class,
            concrete: PasswordHash::class,
        );

    }

    public function provides(): array
    {
        return [
            GetLoggedInUserServiceInterface::class,
            LogInWithCredentialsServiceInterface::class,
            LoginWithUserServiceInterface::class,
            RegisterUserServiceInterface::class,
            PasswordHashInterface::class,
        ];
    }

    public function boot(): void
    {
        Cashier::useCustomerModel(User::class);
    }
}
