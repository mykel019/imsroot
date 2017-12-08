<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class FinishSetup
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int  $step
     * @return mixed
     */
    public function handle($request, Closure $next, $step)
    {
        if (!$request->user()->isSetup($step)) {
            return redirect('/setup');
        }

        return $next($request);
    }


}
