<?php

namespace App\Http\Middleware;

use App\Models\Student;
use App\Models\Worker;
use Closure;
use Illuminate\Http\Request;

class WorkerAPIMiddleware
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
        $worker=Worker::getTokenWorker($request->header('token'));
        if($worker){
            $request->worker=$worker;
            return $next($request);
        };
        return abort(404);
    }
}
