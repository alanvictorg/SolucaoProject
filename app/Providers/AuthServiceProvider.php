<?php

namespace App\Providers;

use App\Entities\Permissions;
use App\Entities\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

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
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        $gate->before(function(User $user, $ability)
        {
           if ($user->isSuperAdmin()){
               return true;
           }
        });

        $permissions = Permissions::with('roles')->get();

        foreach ($permissions as $permission)
        {
            $gate->define($permission->name, function(User $user) use ($permission)
            {
                    return $user->hasPermission($permission);
            });
        }


    }
}
