<?php

namespace App\Observers\Tenant;

use App\Models\Tenant\Categorie;
use Illuminate\Support\Str;

class CategorieObserver
{
    /**
     *
     *
     */
    public function creating(Categorie $role)
    {
        $role->slug = Str::upper(Str::snake(Str::lower($role->nom)));
    }
}
