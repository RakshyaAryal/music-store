<?php

namespace App\Http\Middleware;

use App\Libraries\AccessListLibrary;
use Closure;

class CheckAccessList
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
        $urlSegment2 = Request::segment(2);

        if(!AccessListLibrary::haveAccess($urlSegment2)) {
            echo "You do not have access to view this page";
            exit;
        }
        return $next($request);
    }
}
