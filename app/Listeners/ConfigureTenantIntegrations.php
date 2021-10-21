<?php

namespace App\Listeners;

use App\Models\Tenant;
use App\Services\ConnectionResolver;
use Laravel\Passport\Client as OClient;
use Illuminate\Contracts\Config\Repository;
use Tenancy\Affects\Configs\Events\ConfigureConfig;
use Tenancy\Affects\Models\Events\ConfigureModels;

class ConfigureTenantIntegrations
{
    /**
     * @param ConfigureConfig|Repository $event
     */
    public function handle(ConfigureConfig $event)
    {

        /**
         * @var $tenant Tenant
         *  */
        if ($tenant = $event->event->tenant) {

            $event->set([
                'app.tenant_id' => $tenant->getTenantKey(),
//                'app.tenant' => $tenant,
//                'filesSystems.disks.public.root' => app('path.public') . (DIRECTORY_SEPARATOR . 'storage') . DIRECTORY_SEPARATOR . $tenant->getTenantKey(),
                'lighthouse.cache.key' => 'lighthouse-schema-' . $tenant->getTenantKey(),
                'auth.providers.users.model' => \App\Models\Tenant\User::class,
                'app.name' => $tenant->getTenantKey(),
                'passport.storage.database.connection' => 'tenant',
                'lighthouse.namespaces.models' => ['App\\Models\\Tenant'],
                'lighthouse.schema.register' => base_path('graphql/tenant/schema.graphql'),
                'lighthouse-graphql-passport.schema' => base_path('graphql/tenant/auth.graphql'),
                /*'filesystems.disks.public_tenant' => [
                    'driver' => 'local',
                    'root' => storage_path('app/public/' . $tenant->getTenantKey()),
                    'url' => env('APP_URL') . '/storage/' . $tenant->getTenantKey(),
                    'visibility' => 'public',
                ],*/
            ]);

        }
    }
}
