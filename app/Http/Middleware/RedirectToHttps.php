<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectToHttps
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifiez si la requête n'est pas déjà sécurisée
        if (!$request->secure() && !$request->is('favicon.ico') && !$request->is('js/*') && !$request->is('css/*')) {
            // Redirection vers HTTPS
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
