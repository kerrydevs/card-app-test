<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class LimitRequests
{
    public function handle(Request $request, Closure $next)
    {
        $key = 'request:' . $request->ip(); // Unique key per IP address
        $maxAttempts = 20;
        $decayMinutes = 1; // Time period for rate limiting

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            return response()->json([
                'error' => 'Irregularity occurred'
            ], 429);
        }

        RateLimiter::hit($key, $decayMinutes * 60); // Hits the limit

        return $next($request);
    }
}