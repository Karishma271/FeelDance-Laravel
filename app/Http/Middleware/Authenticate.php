<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
{
    if (in_array('admin', $guards)) {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
    } else {
        if (!Auth::guard($guards)->check()) {
            return redirect()->route('login');
        }
    }

    return $next($request);
}

}
