<?php

namespace App\Listeners;

use Tenancy\Identification\Events\NothingIdentified;

class NoTenantIdentified
{

    public function handle(NothingIdentified $event)
    {
//        throw new \Exception(config('database.connections'));
//        abort(404);
    }
}
