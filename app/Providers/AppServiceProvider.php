<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // sharing input attributes function for laravelcollective between views.
        view()->share('input_attributes',
            function ($has_errors, $is_required = true, $pattern = null, $title = null){
                return [
                    'class'     => 'form-control' . ($has_errors ? ' is-invalid' : null),
                    'required'  => $is_required,
                    'pattern' => $pattern,
                    'title' => $title,
                ];
            }
        );

        // using bootstrap as the default paginator
        Paginator::useBootstrap();
    }
}
