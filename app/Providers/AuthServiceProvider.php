<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is_user_admin', function ($user) {
            return $user->is_admin;
        });

        Gate::define('is_user_approved', function ($user) {
            return $user->publisher_id > 0;
        });

        /**
         * his method will register the routes necessary to issue access tokens
         * and revoke access tokens clients, and personal access tokens:
         */
        Passport::routes();
    }
}
