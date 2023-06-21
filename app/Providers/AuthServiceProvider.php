<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('guest', function($user) {
            return $user->hasRole('guest');
        });
        Gate::define('authorised', function($user) {
            return $user->hasRole('authorised');
        });
        Gate::define('is-admin', function($user) {
            return $user->hasRole('admin');
        });
    }
}
