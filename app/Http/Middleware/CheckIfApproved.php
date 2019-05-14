<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckIfApproved
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
        // Se o usuário tiver ligado a algum publicador, então está aprovado
        if(Auth::check() && Auth::user()->publisher_id > 0 )
            return $next($request);
            
        return redirect()->action('MainController@main');
    }
}
