<?php

namespace App\Providers;

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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
