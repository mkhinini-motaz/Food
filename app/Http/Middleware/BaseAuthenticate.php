<?php

namespace App\Http\Middleware;

use App\Models\Client;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware as JWTBaseMiddleware;

/**
 * Class BaseMiddleware
 *
 * @package App\Http\Middleware
 */
abstract class BaseAuthenticate extends JWTBaseMiddleware
{
    /**
     * @var string
     */
    protected $guard = '';

    /**
     * @var string
     */
    protected $entity = '';

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request  $request
     *
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    /**
     * @param Request  $request
     * @param \Closure $next
     *
     * @return JsonResponse
     */
    public function handle(Request $request, \Closure $next)
    {
        try {
            $jwtToken = $this->auth->parseToken();
            $jwtToken->getPayload();
        } catch (JWTException $exception) {
            return response()->json([ 'status' => 'error', 'message' => 'token:invalid' ], 403);
        }

        $entity = $jwtToken->getClaim('entity');
        if ($entity !== $this->entity) {
            return response()->json([ 'status' => 'error', 'message' => 'token:invalid' ], 403);
        }

        $token        = $jwtToken->getToken()->get();
        $revokedToken = \Cache::get($token);
        if (isset($revokedToken)) {
            return response()->json([ 'status' => 'error', 'message' => 'token:invalid' ], 403);
        }

        $entityId = $jwtToken->getClaim('sub');
        $entity   = $this->entity::find($entityId);
        if (! $entity) {
            return response()->json([ 'status' => 'error', 'message' => 'token:invalid' ], 403);
        }

        auth()->shouldUse($this->guard);
        auth()->login($entity);

        return $next($request);
    }
}
