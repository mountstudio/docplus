<?php

namespace App\Providers;

use App\Doctor;
use App\Clinic;
use App\Feedback;
use App\Observers\ClinicObserver;
use App\Observers\DoctorObserver;
use App\Observers\FeedbackObserver;
use App\Observers\QuestionObserver;
use App\Question;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        Doctor::observe(DoctorObserver::class);
        Clinic::observe(ClinicObserver::class);
        Feedback::observe(FeedbackObserver::class);
        Question::observe(QuestionObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
