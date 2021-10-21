<?php

namespace App\Listeners;

use Tenancy\Affects\Connections\Events\Drivers\Configuring;

class ConfigureTenantConnection
{
    public function handle(Configuring $event)
    {

        if ($event->tenant) {
            $event->useConnection('mysql', $event->defaults($event->tenant));
        }

    }
}
