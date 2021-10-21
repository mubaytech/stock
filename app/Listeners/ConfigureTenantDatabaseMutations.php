<?php

namespace App\Listeners;

use Tenancy\Hooks\Database\Events\ConfigureDatabaseMutation;
use Tenancy\Tenant\Events\Deleted;

class ConfigureTenantDatabaseMutations
{
    public function handle(ConfigureDatabaseMutation $event)
    {

        if ($event->event instanceof Deleted) {
//            $event->disable();
        }
    }
}
