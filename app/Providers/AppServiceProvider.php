<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        Gate::define('founder', function (User $user) {
            return $user->role_id === 1;
        });
        Gate::define('author', function (User $user) {
            return $user->role_id === 2;
        });
        Gate::define('public_relation', function (User $user) {
            return $user->role_id === 3;
        });
        Gate::define('designer', function (User $user) {
            return $user->role_id === 4;
        });
    }
}
