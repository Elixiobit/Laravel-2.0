<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckingAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userActive = \Auth::user();
        if (!$userActive->is_admin) {
            return redirect()->route('home')
                ->with('status', 'У вас нет прав!');
        }
        return $next($request);
    }
}
