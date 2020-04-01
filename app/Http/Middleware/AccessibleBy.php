<?php

namespace App\Http\Middleware;

use App\Model\Admin;
use App\Model\Client;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AccessibleBy extends Middleware
{
    const MODELS = [
        'admin' => Admin::class,
        'client' => Client::class,
    ];

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $model
     *
     * @return mixed
     */
    public function handle($request, \Closure $next, $model)
    {
        if (!in_array($model, array_keys(self::MODELS))) {
            throw new \InvalidArgumentException('$model must be on of the defined \App\Http\Middleware\AccessibleBy::MODELS');
        }

        $user = $request->user();
        if (get_class($user) !== self::MODELS[$model]) {
            return response()->json([ 'status' => 'error', 'messages' => ['token:invalid'] ], 403);
        }

        return $next($request);
    }
}
