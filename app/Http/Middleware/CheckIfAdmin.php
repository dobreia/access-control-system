<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // Middleware/CheckIfAdmin.php
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->admin) {
            // Ha a felhasználó nem admin, átirányítjuk egy hibaoldalra vagy a kezdőlapra
            return redirect()->route('home')->with('error', 'Nincs jogosultságod a művelethez.');
        }

        return $next($request);
    }

}