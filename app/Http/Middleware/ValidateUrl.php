<?php

namespace App\Http\Middleware;

use Closure;

class ValidateUrl {

    public function handle($request, Closure $next)
    {
        $uri = $request->getRequestUri();
        $parse_uri = parse_url($uri);
        if(!$parse_uri) {
            return redirect('/', 301);
        }
        if (substr($request->header('host'), 0, 4) == 'www.') {
            $host = str_replace('www.', '', $request->header('host'));
            $request->headers->set('host', $host);
            return redirect($request->fullUrl(), 301);
        }
        return $next($request);
    }
}
