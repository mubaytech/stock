<?php

namespace App\Providers;


use App\Models\Tenant;
use App\Models\Tenant\Categorie;
use App\Models\Tenant\Role;
use App\Models\Tenant\UnitesDeMesure;
use App\Observers\Tenant\CategorieObserver;
use App\Observers\Tenant\RoleObserver;
use App\Observers\Tenant\UnitesDeMesureObserver;
use Illuminate\Support\ServiceProvider;
use Laravel\Telescope\Telescope;
use Tenancy\Identification\Contracts\ResolvesTenants;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->resolving(ResolvesTenants::class, function (ResolvesTenants $resolver) {
            $resolver->addModel(Tenant::class);
            return $resolver;
        });
        Telescope::ignoreMigrations();
//        Socialite::getFacadeApplication()->
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Role::observe(RoleObserver::class);
        UnitesDeMesure::observe(UnitesDeMesureObserver::class);
        Categorie::observe(CategorieObserver::class);
    }
}
