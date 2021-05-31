<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
class AdminorNot
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
        if(!auth()->user() || !auth()->user()->isadmin())
        {
            return redirect('home');
        }/*else{
            return redirect('dashboard');
        }*/
        return $next($request);
    }
}
