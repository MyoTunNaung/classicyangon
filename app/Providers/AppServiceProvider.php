<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        //
        User::creating(function ($user) {
            if (Auth::check()) {
                $user->created_by = Auth::id();
            }
        });

        User::updating(function ($user) {
            if (Auth::check()) {
                $user->updated_by = Auth::id();
            }
        });
    }
}
