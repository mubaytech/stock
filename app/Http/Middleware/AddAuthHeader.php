<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;


class AddAuthHeader
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->bearerToken() && $session_string = $request->cookie(config('app.tenant_name') . '_session')) {
            try {
                $session = json_decode($session_string, true);
                if ($session['access_token']) {
                    config('app.current_user_tokens', $session);
                    $request->headers->add(['Authorization' => 'Bearer ' . $session['access_token']]);
                }
            } catch (Exception $exception) {
                report($exception);
            }
        }
        return $next($request);
    }
}
