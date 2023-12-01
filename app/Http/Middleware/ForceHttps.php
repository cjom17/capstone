<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    public function handle($request, Closure $next)
    {
        if (!$request->secure() && env('APP_ENV') === 'production') {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
    
}
