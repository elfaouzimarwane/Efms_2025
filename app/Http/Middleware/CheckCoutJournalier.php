<?php

namespace App\Http\Middleware;

use Closure;

class CheckCoutJournalier
{
    public function handle($request, Closure $next)
    {
        if ($request->input('cout_journalier') <= 50) {
            return back()->withErrors([
                'cout_journalier' => 'Le coût journalier doit être supérieur à 50.'
            ]);
        }

        return $next($request);
    }
}
