<?php

namespace App\Observers\Tenant;

use App\Models\Tenant\Role;
use Illuminate\Support\Str;

class RoleObserver
{

    /**
     *
     *
     */
    public function creating(Role $role)
    {
        $role->slug =Str::upper(Str::snake($role->nom)) ;

    }


    /**
     * Handle the Role "created" event.
     *
     * @param \App\Models\Tenant\Role $role
     * @return void
     */
    public function created(Role $role)
    {
        //
    }

    /**
     * Handle the Role "updated" event.
     *
     * @param \App\Models\Tenant\Role $role
     * @return void
     */
    public function updated(Role $role)
    {
        //
    }

    /**
     * Handle the Role "deleted" event.
     *
     * @param \App\Models\Tenant\Role $role
     * @return void
     */
    public function deleted(Role $role)
    {
        //
    }

    /**
     * Handle the Role "restored" event.
     *
     * @param \App\Models\Tenant\Role $role
     * @return void
     */
    public function restored(Role $role)
    {
        //
    }

    /**
     * Handle the Role "force deleted" event.
     *
     * @param \App\Models\Tenant\Role $role
     * @return void
     */
    public function forceDeleted(Role $role)
    {
        //
    }
}
