<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        //
        Paginator::useBootstrapFive();

        // Kalo simple bisa pke gate aja
        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });


        // Kalo rumit bisa pake policies
        /*
        Penerapannnya mungkin :
        1. Buat table policies yg isinya kolom :
            -> Foreign key ke tabel users
            -> Admin
            -> Owner
            -> Dll
        */
    }
}
