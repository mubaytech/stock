<?php

namespace App\GraphQL\Directives;


use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Cookie;
use Nuwave\Lighthouse\Schema\Values\FieldValue;
use Nuwave\Lighthouse\Support\Contracts\Directive;
use Nuwave\Lighthouse\Support\Contracts\FieldMiddleware;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Tenancy\Facades\Tenancy;

class MakeSessionDirective implements Directive, FieldMiddleware
{
    /**
     * @param $rootValue
     * @param array $args
     * @param GraphQLContext|null $context
     * @param ResolveInfo $resolveInfo
     *
     * @return array
     * @throws \Exception
     *
     */
    public function name(): string
    {
        return 'makeSession';
    }

    public function handleField(FieldValue $fieldValue, Closure $next): FieldValue
    {
        // Retrieve the existing resolver function
        /** @var Closure $previousResolver */
        $previousResolver = $fieldValue->getResolver();

        // Wrap around the resolver
        $wrappedResolver = function ($root, array $args, GraphQLContext $context, ResolveInfo $info) use ($previousResolver): array {
            // Call the resolver, passing along the resolver arguments
            /** @var array $result */
            $result = $previousResolver($root, $args, $context, $info);
            //dd($result);
            if ($result['access_token']) {
                $session = ['access_token' => $result['access_token'], 'refresh_token' => $result['refresh_token'], 'expires_in' => $result['expires_in'], 'token_type' => $result['token_type']];
                Cookie::queue(
                    (Tenancy::isIdentified() ? Tenancy::getTenant()->getTenantKey() : '') . '_session',
                    json_encode($session),
                    (int)($result['expires_in'] / 60),
                    '/',
                    $context->request->getHost(),
                    false,
                    true
                );
            }
            return $result;
        };

        // Place the wrapped resolver back upon the FieldValue
        // It is not resolved right now - we just prepare it
        $fieldValue->setResolver($wrappedResolver);

        // Keep the middleware chain going
        return $next($fieldValue);
    }

    public static function definition(): string
    {
        // TODO: Implement definition() method.
    }
}
