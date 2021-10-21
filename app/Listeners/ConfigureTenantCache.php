<?php

namespace App\Listeners;


use Tenancy\Affects\Cache\Events\ConfigureCache;

class ConfigureTenantCache
{
    public function handle(ConfigureCache $event)
    {
        $event->config = [
            /*'driver' => 'database',
            'table' => 'cache',
            'connection' => null,
            'lock_connection' => null,*/
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),

        ];
    }
}
