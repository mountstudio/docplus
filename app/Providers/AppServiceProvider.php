<?php

namespace App\Providers;

use App\Blog;
use App\Doctor;
use App\Clinic;
use App\Feedback;
use App\Observers\BlogObserver;
use App\Observers\ClinicObserver;
use App\Observers\DoctorObserver;
use App\Observers\FeedbackObserver;
use App\Observers\QuestionObserver;
use App\Question;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
        Blog::observe(BlogObserver::class);

        Blade::if('admin', function () {
            return Auth::check() && Auth::user()->role === 'ROLE_ADMIN';
        });

        Blade::if('user', function () {
            return Auth::check() && Auth::user()->role === 'ROLE_USER';
        });
        /**
         * Paginate a standard Laravel Collection.
         *
         * @param int $perPage
         * @param int $total
         * @param int $page
         * @param string $pageName
         * @return array
         */
        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
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
