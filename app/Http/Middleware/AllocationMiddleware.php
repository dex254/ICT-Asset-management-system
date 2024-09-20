<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Allocation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllocationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allocation =Allocation ::all();


        // Pass products to the controller
        $request->merge(['allocation' => $allocation]);
        return $next($request);
    }
}
