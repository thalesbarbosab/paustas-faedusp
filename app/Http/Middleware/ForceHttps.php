<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class ForceHttps
{
    public function handle($request, Closure $next)
    {
        if (! $request->secure() && App::environment() === 'production') {
            // return redirect()->secure($request->getRequestUri());
             \URL::forceScheme('https');
        }

        return $next($request);
    }
}
