<?php

namespace App\Listeners;


use Database\Seeders\TenantDatabaseSeeder;
use Tenancy\Hooks\Migration\Events\ConfigureSeeds;

class ConfigureTenantSeeds
{
    public function handle(ConfigureSeeds $event)
    {
        if ($event->hook->action === 'run') {
            $event->seed(TenantDatabaseSeeder::class);
        }

    }
}
