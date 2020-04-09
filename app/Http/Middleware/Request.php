<?php

namespace App\Http\Middleware;

use Closure;

class Request
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
        // $request->request->add(['phone' => preg_replace('/[\\s+\(\)-]/', '', $request->phone)]);
        // $request->request->add(['street' => preg_replace('/[\\s+\(\)-]/', '', $request->phone)]);
        return $next($request);
    }
}
