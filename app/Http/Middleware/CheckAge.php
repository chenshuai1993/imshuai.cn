<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
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

        #前置中间键
        if($request->age > 100){
            echo '年龄太大了';
            return false;
        }

        $next($request);

        #后置中间键

        echo '后置中间键这里处理逻辑';
        return false;
    }
}
