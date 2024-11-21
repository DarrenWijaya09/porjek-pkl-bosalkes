<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckEmailDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $userEmail = Auth::user()->email;
            $emailDomain = substr(strrchr($userEmail, "@"), 1);

            // Jika domain adalah admin.com tetapi belum berada di area admin, arahkan ke admin.dashboard
            if ($emailDomain === 'admin.com') {
                // Izinkan semua rute di dalam prefix admin.*
                if ($request->routeIs('admin.*')) {
                    return $next($request); // Lanjutkan ke rute admin
                }
                // Redirect jika bukan rute admin
                return redirect()->route('admin.dashboard');
            }
        }

        return $next($request); // Lanjutkan untuk pengguna non-admin
    }
}
