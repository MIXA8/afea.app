<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WebWorkerDenary
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (\Illuminate\Support\Facades\Auth::guard('worker')->user()->department_worker->title == "Деканат"){
        return $next($request);
    };
        return abort(404);
    }
}
