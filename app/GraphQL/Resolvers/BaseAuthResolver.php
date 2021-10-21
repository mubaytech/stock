<?php


namespace App\GraphQL\Resolvers;


use Illuminate\Http\Request;
use Joselfonseca\LighthouseGraphQLPassport\Exceptions\AuthenticationException;
use Tenancy\Facades\Tenancy;

class BaseAuthResolver
{
    /**
     * @param array $args
     * @param string $grantType
     *
     * @return mixed
     */
    public function buildCredentials(array $args = [], $grantType = 'password')
    {
        $collection = collect($args);
        $credentials = $collection->except('directive')->toArray();
        $credentials['client_id'] = $collection->get('client_id', config('lighthouse-graphql-passport.client_id'));
        $credentials['client_secret'] = $collection->get('client_secret', config('lighthouse-graphql-passport.client_secret'));
        $credentials['grant_type'] = $grantType;

        return $credentials;
    }

    /**
     * @param array $credentials
     *
     * @return mixed
     * @throws AuthenticationException
     *
     */
    public function makeRequest(array $credentials)
    {
        $request = Request::create('/oauth/token', 'POST', $credentials, [], [], [
            'X-TENANT-ID' => Tenancy::isIdentified() ? Tenancy::getTenant()->getTenantKey() : null,
            'HTTP_Accept' => 'application/json',
        ]);
        $response = app()->handle($request);
        $decodedResponse = json_decode($response->getContent(), true);
        if ($response->getStatusCode() !== 200) {
            throw new AuthenticationException(__('Authentication exception'), __(' Utilisateur ou mot de passe incorrecte'));
        }

        return $decodedResponse;
    }
}
