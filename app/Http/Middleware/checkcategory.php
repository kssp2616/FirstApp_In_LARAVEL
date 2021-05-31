<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\category;

class checkcategory
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
         $count=category::all()->count();
        if($count==0)
        {
        session()->flash('error','First you need to add some categories.');
        return redirect(route('categories.index'));
        }
        return $next($request);
    }
}
