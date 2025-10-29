<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (! auth()->check()) {
            // Not logged in
            abort(403, 'Unauthorized action.');
        }

        if (! auth()->user()->hasRole($role)) {
            // Logged in, but does not have the required role
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
