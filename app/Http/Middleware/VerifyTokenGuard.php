<?php

namespace App\Http\Middleware;

use Closure;
use App\TokenGuard;

class VerifyTokenGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $tokenValid = TokenGuard::whereToken($request->header('Authorization'))->whereStatus(true)->exists();

        if (!$tokenValid) {
            return response()->json('Unauthorized', 401);
        }

        return $next($request);
    }
}
