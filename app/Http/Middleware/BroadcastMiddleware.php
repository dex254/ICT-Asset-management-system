<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Broadcasts;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BroadcastMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $broadcast = Broadcasts ::all();

        // Pass filtered data to the controller
        $request->merge(['broadcast' => $broadcast]);

        // Redirect to login page for DRS
        return $next($request);
    }
}
