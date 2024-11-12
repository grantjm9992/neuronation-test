<?php

namespace App\Providers;

use App\Domain\Repositories\CourseRepositoryInterface;
use App\Domain\Repositories\DomainCategoryRepositoryInterface;
use App\Domain\Repositories\ExerciseRepositoryInterface;
use App\Domain\Repositories\ScoreRepositoryInterface;
use App\Domain\Repositories\SessionRepositoryInterface;
use App\Domain\Repositories\UserRepositoryInterface;
use App\Infrastructure\Repositories\CourseRepository;
use App\Infrastructure\Repositories\DomainCategoryRepository;
use App\Infrastructure\Repositories\ExerciseRepository;
use App\Infrastructure\Repositories\ScoreRepository;
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
        $this->app->singleton(
            abstract: CourseRepositoryInterface::class,
            concrete: CourseRepository::class
        );
        $this->app->singleton(
            abstract: ExerciseRepositoryInterface::class,
            concrete: ExerciseRepository::class
        );
        $this->app->singleton(
            abstract: ScoreRepositoryInterface::class,
            concrete: ScoreRepository::class
        );
    }

    public function provides(): array
    {
        return [
            SessionRepositoryInterface::class,
            DomainCategoryRepositoryInterface::class,
            UserRepositoryInterface::class,
            CourseRepositoryInterface::class,
            ExerciseRepositoryInterface::class,
            ScoreRepositoryInterface::class,
        ];
    }
}
