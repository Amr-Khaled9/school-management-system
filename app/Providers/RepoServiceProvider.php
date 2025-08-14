<?php

namespace App\Providers;

use App\Repository\PromotionRepository;
use App\Repository\PromotionRepositoryInterface;
use App\Repository\StudentRepository;
use App\Repository\StudentsRepositoryInterface;
use App\Repository\TeacherRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\TeacherRepositoryInterface;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            TeacherRepositoryInterface::class,
            TeacherRepository::class,

        );
        $this->app->bind(
            StudentsRepositoryInterface::class,
            StudentRepository::class,

        );
        $this->app->bind(
            PromotionRepositoryInterface::class,
            PromotionRepository::class,

        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
