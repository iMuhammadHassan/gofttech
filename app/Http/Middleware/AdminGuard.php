<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminGuard
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and if their role is admin (role = 1)
        if (auth()->check() && auth()->user()->role == 1) {
            return $next($request);
        }

        // If not authorized, return a 403 error
        abort(403, 'Unauthorized action.');
    }
}
