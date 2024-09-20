<?php

namespace App\Http\Middleware;


use Closure;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StaffMiddleware
{
    public function handle(Request $request, Closure $next)
    {
         // Fetch all products
          $email = Auth::id();
        $staff = Staff::where('email', $email)->get();

        // Pass filtered data to the controller
        $request->merge(['staff' => $staff]);
        // Check if the user is authenticated as DRS
        if (Auth::guard('staff')->check()) {
            return $next($request);
        }

        // Redirect to login page for DRS
        return redirect()->route('staff')->with('error', 'Unauthorized access.');
    }
}
