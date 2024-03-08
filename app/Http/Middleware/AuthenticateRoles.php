<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateRoles
{
    /**
     * @throws AuthenticationException
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (! user()->hasRole($roles)) {
            throw new AuthenticationException(
                'Unauthenticated.', [], back()->withErrors(["Doesn't have permission !"])
            );
        }

        return $next($request);
    }
}
