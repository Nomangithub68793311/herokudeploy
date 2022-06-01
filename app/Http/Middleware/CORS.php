<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CORS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        header("Access-Control-Allow-Methods: PUT, POST, GET,PATCH, OPTIONS, DELETE,post,get");
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type,X-Auth-Token, Origin,boundary,charset, Content-Length,Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
        header("Access-Control-Allow-Origin: *");

        return $next($request);
    }
}
