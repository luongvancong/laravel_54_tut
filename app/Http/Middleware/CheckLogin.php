<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckLogin {

    public function handle($request, Closure $next)
    {
        if(!Auth::check()) {
            return redirect()->to('/');
        }

        return $next($request);
    }
}