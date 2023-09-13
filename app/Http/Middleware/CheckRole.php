<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if ($role == 'admin' && auth()->user()->role_id != 1)
        {
            return redirect()->route('404');
        }

        if ($role == 'cashier' && auth()->user()->role_id != 2)
        {
            return redirect()->route('404');
        }

        if ($role == 'checker' && auth()->user()->role_id != 3)
        {
            return redirect()->route('404');
        }

        if ($role == 'office' && auth()->user()->role_id != 4)
        {
            return redirect()->route('404');
        }

        return $next($request);
    }
}
