<?php

namespace App\Observers\Tenant;

use App\Models\Tenant\Role;
use App\Models\Tenant\UnitesDeMesure;
use Illuminate\Support\Str;

class UnitesDeMesureObserver
{
    /**
     *
     *
     */
    public function creating(UnitesDeMesure $unitesDeMesure)
    {
        $unitesDeMesure->slug =Str::upper(Str::snake($unitesDeMesure->nom)) ;

    }
}
