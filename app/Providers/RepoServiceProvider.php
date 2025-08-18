<?php

namespace App\Providers;

use App\Repository\AttendenceRepository;
use App\Repository\AttendenceRepositoryInterface;
use App\Repository\FeesInvoiceRepository;
use App\Repository\FeesInvoiceRepositoryInterface;
use App\Repository\FeesRepository;
use App\Repository\FeesRepositoryInterface;
use App\Repository\GraduatedRepository;
use App\Repository\GraduatedRepositoryInterface;
use App\Repository\ProcessingFeeRepository;
use App\Repository\ProcessingFeeRepositoryInterface;
use App\Repository\PromotionRepository;
use App\Repository\PromotionRepositoryInterface;
use App\Repository\ReceiptStudentsRepository;
use App\Repository\ReceiptStudentsRepositoryInterface;
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
        $this->app->bind(
            GraduatedRepositoryInterface::class,
            GraduatedRepository::class,

        );
        $this->app->bind(
            FeesRepositoryInterface::class,
            FeesRepository::class,

        );
        $this->app->bind(
            FeesInvoiceRepositoryInterface::class,
            FeesInvoiceRepository::class,

        );
        $this->app->bind(
            ProcessingFeeRepositoryInterface::class,
            ProcessingFeeRepository::class,


        );
        $this->app->bind(
            ReceiptStudentsRepositoryInterface::class,
           ReceiptStudentsRepository::class,

        );
        $this->app->bind(
            AttendenceRepositoryInterface::class,
            AttendenceRepository::class,

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
