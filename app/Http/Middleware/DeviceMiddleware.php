<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Device;
use App\Models\Devrequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeviceMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {

        $devices = Device ::all();

        // Pass filtered data to the controller
        $request->merge(['devices' => $devices]);
        if ($request->has('sno')) {
            $devices = Device::find($request->sno);
            if ($devices) {
                $request->merge([
                    'model' => $devices->model,
                    'status' => $devices->status
                ]);
            }
        };

        // Redirect to login page for DRS
        return $next($request);
    }
}
