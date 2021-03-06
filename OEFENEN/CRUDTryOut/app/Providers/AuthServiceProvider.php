<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function($user)
        {
            return $user->hasRole('Admin');
        });

        Gate::define('edit-users', function($user)
        {
            return $user->hasRole('Admin');
        });

        Gate::define('delete-users', function($user)
        {
            return $user->hasRole('Admin');
        });

        Gate::define('login-employees', function($user)
        {
            return $user->hasRole('Employee');
        });

        Gate::define('login-admins', function($user)
        {
            return $user->hasRole('Admin');
        });

        Gate::define('profile-employees', function($user)
        {
            return $user->hasRole('Employee');
        });

        
        Gate::define('profile-admins', function($user)
        {
            return $user->hasRole('Admin');
        });

        Gate::define('write-comment', function($user)
        {
            return $user->isOld(5); //days
        });
    }
}
