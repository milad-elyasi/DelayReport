<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Exceptions\Http\InvalidAcceptHeaderException;

class OnlyJsonResponseMiddleware
{
    /**
     * @throws InvalidAcceptHeaderException
     */
    public function handle(Request $request, Closure $next)
    {
        if (!in_array($request->header('accept'), ['*/*', 'application/json', null])) {
            throw new InvalidAcceptHeaderException();
        }
        $request->headers->set('Accept', 'application/json');
        return $next($request);
    }
}
