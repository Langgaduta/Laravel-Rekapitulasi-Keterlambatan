<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            switch ($role) {
                case 'admin':
                    return redirect('/dashboardAdmin')->with('alreadyAccess', 'Anda sudah login!');
                    break;
                case 'ps':
                    return redirect('/dashboardPs')->with('alreadyAccess', 'Anda sudah login!');
                    break;
                default:
                    return redirect('/');
            }
        }


        return $next($request);
    }
}
