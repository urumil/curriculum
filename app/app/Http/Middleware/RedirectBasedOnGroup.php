<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class RedirectBasedOnGroup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->group == 0) {
                return redirect('/admin');
            } elseif ($user->group == 1) {
                return redirect('/');
            }
        }
        return $response;
    }
}

