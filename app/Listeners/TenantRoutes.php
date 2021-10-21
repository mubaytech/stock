<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Passport\Client as OClient;
use Tenancy\Affects\Routes\Events\ConfigureRoutes;

class TenantRoutes
{
    /**
     * @throws \Exception
     */
    public function handle(ConfigureRoutes $event)
    {

        if ($event->event->tenant) {
//            $event
//                ->flush()
//                ->fromFile(
//                    ['middleware' => ['web']],
//                    base_path('/routes/tenant.php')
//                );
            try {
                $oClient = OClient::where('password_client', 1)->firstOrFail();
                config([
                    'lighthouse-graphql-passport.client_id' => $oClient->id,
                    'lighthouse-graphql-passport.client_secret' => $oClient->secret,
                ]);
            } catch (\Exception $e) {
                if (!($e instanceof ModelNotFoundException)) {
                    throw $e;
                }
            }

        }
    }
}
