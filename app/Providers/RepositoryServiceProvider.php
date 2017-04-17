<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RoleRepository::class, \App\Repositories\RoleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PermissionsRepository::class, \App\Repositories\PermissionsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RolePermissionRepository::class, \App\Repositories\RolePermissionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRoleRepository::class, \App\Repositories\UserRoleRepositoryEloquent::class);
        //:end-bindings:
    }
}
