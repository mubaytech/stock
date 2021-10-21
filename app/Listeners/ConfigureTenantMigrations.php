<?php

namespace App\Listeners;

use Tenancy\Hooks\Migration\Events\ConfigureMigrations;

class ConfigureTenantMigrations
{
    public function handle(ConfigureMigrations $event)
    {

        if ($event->event->tenant) {
            $event->path(database_path('tenant/migrations'));
        }
    }
}
