<?php

namespace App\Providers;

use App\Models\admin\Guardian;
use App\Models\admin\Student;
use App\Observers\admin\GuardianObserver;
use App\Observers\admin\StudentObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Student::observe(StudentObserver::class);
        Guardian::observe(GuardianObserver::class);
    }
}
