<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;
use App\Models\Device;
use App\Models\Devrequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ATableMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $admin =Admin ::all();

        $request->merge(['admin' => $admin]);

        // Redirect to login page for DRS
        return $next($request);




    }
}
