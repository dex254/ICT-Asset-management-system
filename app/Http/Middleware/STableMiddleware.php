<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Staff;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class STableMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $staff =Staff ::all();

        $request->merge(['staff' => $staff]);

        // Redirect to login page for DRS
        return $next($request);




    }
}
