<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use App\Repositories\ActivityRepository;
use App\Repositories\MedicineRepository;
use App\Repositories\Interfaces\MedicineRepositoryInterface;
class AppServiceProvider extends ServiceProvider
{
    public const HOME = '/dashboard';
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ActivityRepositoryInterface::class, ActivityRepository::class);
        $this->app->bind(MedicineRepositoryInterface::class, MedicineRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
