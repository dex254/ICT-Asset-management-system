<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Devreturn;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DevreturnMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $devreturn = Devreturn ::all();

        // Pass filtered data to the controller
        $request->merge(['$devreturn' => $devreturn]);

        // Redirect to login page for DRS
        return $next($request);

    }
}
