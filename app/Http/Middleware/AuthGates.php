<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthGates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->checkPermission($request);
        return $next($request);
    }

    public function checkPermission(Request $request)
    {
        $user = Auth::guard('admin')->user();
        if (!$user->role) {

            abort(403, 'You must be an administrator.');
        } else {
            $permissions = $user->role->permissions->pluck('slug')->toArray();
            $current_route_name = $request->route()->action['as'];

            if (!in_array($current_route_name, $permissions)) {
                //return redirect()->route('dashboard.index');
                abort(403, 'You must be an administrator.');
            }
        }
    }
}
