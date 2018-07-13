<?php

namespace App\Http\Middleware;

use Closure;

class PublishedMiddleware
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

        if ($request->route()->parameters()['event']['published'] == 0) {
           //return redirect()->route('index');
           return abort(404);
        }
        else{
            return $next($request);
        }
    }
}
