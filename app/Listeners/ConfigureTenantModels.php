<?php

namespace App\Listeners;


use App\Services\ConnectionResolver;
use Laravel\Passport\AuthCode;
use Laravel\Passport\Client;
use Laravel\Passport\PersonalAccessClient;
use Laravel\Passport\Token;
use Tenancy\Affects\Models\Events\ConfigureModels;


class ConfigureTenantModels
{
    protected $models = [
        'passportClient' => Client::class,
        'passportToken' => Token::class,
        'passportAuthCode' => AuthCode::class,
        'passportAccessClient' => PersonalAccessClient::class,
    ];


    public function handle(ConfigureModels $event)
    {

        if ($event->event->tenant) {
            ConfigureModels::setConnectionResolver(
                $this->models,
                new ConnectionResolver('tenant', resolve('db'))
            );
            /* $event->setConnection(
                 $this->models,
                 Tenancy::getTenantConnectionName()
             );*/
        }
    }
}
