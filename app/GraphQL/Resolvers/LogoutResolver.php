<?php


namespace App\GraphQL\Resolvers;


use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Joselfonseca\LighthouseGraphQLPassport\Exceptions\AuthenticationException;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class LogoutResolver
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
    public function resolve($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo): array
    {
        if (!Auth::guard('api')->check()) {
            throw new AuthenticationException('Not Authenticated', 'Not Authenticated');
        }
        // revoke user's token
        Auth::guard('api')->user()->token()->revoke();
        Cookie::forget('_token');
        return [
            'status' => 'TOKEN_REVOKED',
            'message' => __('Your session has been terminated'),
        ];
    }
}
