<?php

namespace App\Http\Middleware;

use App\Models\Worker_role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerUMO
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
        if(Auth::guard('worker')->user() && ( Auth::guard('worker')->user()->getAccessValue('dean') || Auth::guard('worker')->user()->getAccessValue('lord'))){
            return $next($request);
        };
        return abort(404);
    }
}
