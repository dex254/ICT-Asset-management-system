<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Devrequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DevrequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $devrequest = Devrequest ::all();

        // Pass filtered data to the controller
        $request->merge(['devrequest' => $devrequest]);

        // Redirect to login page for DRS
        return $next($request);

    }
}
