<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckAdmin {

    public function handle($request, Closure $next)
    {
        if(Auth::user()->admin != 1) {
            return abort(403);
        }

        return $next($request);
    }
}