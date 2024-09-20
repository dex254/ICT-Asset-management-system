<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
         // Fetch all products
          $email = Auth::id();
        $admin = Admin::where('email', $email)->get();

        // Pass filtered data to the controller
        $request->merge(['admin' => $admin]);
        // Check if the user is authenticated as ksg user
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        // Redirect to login page for admin
        return redirect()->route('admin')->with('error', 'Unauthorized access.');
    }
}
