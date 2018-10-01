<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\permission;

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
 // Comente essa função antes de fazer o migrate, apos realizar o migrate descomente
    $this->registerPolicies($gate);
    $permissions = Permission::with('roles')->get();
    foreach($permissions as $permission){

    $gate::define($permission->nome,function(User $user)use($permission){
          return $user->hasPermission($permission);
    });
    }
        // Comente esta area acima para realizar o comando migrate, apos realizar o migrate descomente
}
}
