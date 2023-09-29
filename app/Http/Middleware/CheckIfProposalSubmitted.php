<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIfProposalSubmitted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(auth()->user()->proposals->contains('job_id', $request->job->id)) {
            return redirect()->route('Jobs.index')->with('error', 'Vous avez déjà soumis une proposition pour cette offre.');
        }


        return $next($request);
    }
}
