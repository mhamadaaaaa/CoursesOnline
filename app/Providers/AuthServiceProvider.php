<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        $this->registerPolicies();
        // $user = User::all();
        Gate::define('category.view', function ($user) {
            return true;
        });
        Gate::define('category.create', function ($user) {
            if ($user->type == 'admin') {
                return true;
            }
            return false;
        });
        Gate::define('category.delete', function ($user) {
            if ($user->type == 'admin') {
                return true;
            }
            return false;
        });
        Gate::define('category.update', function ($user) {
            if ($user->type == 'admin') {
                return true;
            }
            return false;
        });
        //////////////////////////////////////////
        Gate::define('course.view', function ($user) {
            if ($user->type == 'admin'||$user->type == 'teacher') {
                return true;
            }
            return false;
        });
        Gate::define('course.create', function ($user) {
            if ($user->type == 'teacher') {
                return true;
            }
            return false;
        });
        Gate::define('course.delete', function ($user) {
            if ($user->type == 'teacher') {
                return true;
            }
            return false;
        });
        Gate::define('course.update', function ($user) {
            if ($user->type == 'teacher') {
                return true;
            }
            return false;
        });
        ////////////////////////////////
        Gate::define('video.view', function ($user) {
            if ($user->type == 'admin'||$user->type == 'teacher') {
                return true;
            }
            return false;
        });
        Gate::define('video.create', function ($user) {
            if ($user->type == 'teacher') {
                return true;
            }
            return false;
        });
        Gate::define('video.delete', function ($user) {
            if ($user->type == 'teacher') {
                return true;
            }
            return false;
        });
        Gate::define('video.update', function ($user) {
            if ($user->type == 'teacher') {
                return true;
            }
            return false;
        });


    }
}
