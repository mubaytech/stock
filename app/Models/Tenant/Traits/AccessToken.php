<?php

namespace App\Models\Tenant\Traits;

use Laravel\Passport\ClientRepository;
use Laravel\Passport\Token;
use Laravel\Passport\TokenRepository;

trait AccessToken
{
    /**
     * Get personal access token for user.
     *
     * @return Token|null
     */
    public function getToken(): ?Token
    {
        return app(TokenRepository::class)->findValidToken(
            $this,
            app(ClientRepository::class)->personalAccessClient()
        );
    }
}
