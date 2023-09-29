<?php

namespace App\Http\Middleware;

use Closure;
//use DragonCode\Contracts\Cashier\Auth\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAccountValidity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && $user->date_inactive && $user->date_inactive > now()) {
            return redirect()->route('home')->with('errorabonnement', 'Vous avez un abonnement en cours. Veuillez patienter la fin de votre abonnement pour pouvoir effectuer cette action');
        }

        return $next($request);
    }
}
