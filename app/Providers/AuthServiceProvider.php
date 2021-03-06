<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\reserva;
use App\permission;
use App\User;

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
    public function boot(Gate $gate)  {
        try {
            $this->registerPolicies($gate);
            $permissions = permission::with('roles')->get();
                foreach ($permissions as $permission) {
                    $gate::define($permission->nome, function (User $user) use ($permission) {
                    return $user->hasPermission($permission);
                    });
                }
            }
            catch (QueryException $e) {
                return $e;
            }
        }
    }
