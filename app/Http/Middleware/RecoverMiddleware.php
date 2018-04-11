<?php

namespace App\Http\Middleware;

use App\Model\Recover;
use Closure;

class RecoverMiddleware
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
        $recover = Recover::recovered();
        if(!$recover->id){return redirect()->route('recover');}
        elseif(!$recover->email){return redirect()->route('recover.mail');}
        elseif(!$recover->response || !$recover->response){return redirect()->route('recover.sq');}
        else {
            return $next($request);
        }
    }
}
