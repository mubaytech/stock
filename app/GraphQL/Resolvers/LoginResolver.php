<?php


namespace App\GraphQL\Resolvers;


use Exception;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class LoginResolver extends BaseAuthResolver
{
    /**
     * @param $rootValue
     * @param array $args
     * @param GraphQLContext|null $context
     * @param ResolveInfo $resolveInfo
     *
     * @return array
     * @throws Exception
     *
     */
    public function resolve($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo): array
    {
        $credentials = $this->buildCredentials($args);
        $response = $this->makeRequest($credentials);
        $user = $this->findUser($args['username']);

        $this->validateUser($user);

        return array_merge(
            $response,
            [
                'user' => $user,
            ]
        );
    }

    protected function validateUser($user): void
    {
        $authModelClass = $this->getAuthModelClass();
        if ($user instanceof $authModelClass && $user->exists) {
            return;
        }

        throw (new ModelNotFoundException())->setModel(
            get_class($this->makeAuthModelInstance())
        );
    }

    protected function getAuthModelClass(): string
    {
        return config('auth.providers.users.model');
    }

    protected function makeAuthModelInstance()
    {
        $modelClass = $this->getAuthModelClass();
        return new $modelClass();
    }

    protected function findUser(string $username)
    {
        $model = $this->makeAuthModelInstance();

        if (method_exists($model, 'findForPassport')) {
            return $model->findForPassport($username);
        }

        return $model->where(config('lighthouse-graphql-passport.username'), $username)->first();
    }
}
