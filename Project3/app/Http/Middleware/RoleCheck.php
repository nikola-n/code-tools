<?php

namespace App\Http\Middleware;

use Closure;

class RoleCheck
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
        $users = \DB::table('users');
        if($users->roles = 1)
            return redirect()->route('/admin');
        else {
            return redirect()->route('programming');
        }
        return $next($request);
    }
}
