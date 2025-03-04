<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string|array $roles): Response
    {
        $user = $request->user();

        if (is_array($roles)) {
            $roles = implode('|', array_map(static fn ($role) => $role, $roles));
        }

        if (array_find($roles, fn ($role) => in_array($role, $user->roles))) {
            return $next($request);
        }

        throw new UnauthorizedException('User does not have the right roles.');
    }
}
