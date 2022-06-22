<?php

namespace App\Http\Middleware;

use App\Models\Worker;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerAPIDenary
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
        if($worker->worker_access_api('dean')){
            $request->worker=$worker;
            return $next($request);
        };
        return abort(404);
    }
}
