<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeedbackMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $feedback = Feedback ::all();


        // Pass products to the controller
        $request->merge(['feedback' => $feedback]);
        return $next($request);
    }
}
