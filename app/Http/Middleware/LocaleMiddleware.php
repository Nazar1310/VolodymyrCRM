<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;


class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public static $mainLanguage = 'en';

    public static $languages = ['en', 'ua'];


    public static function getLocale()
    {
        $uri = URL::current();

        $segmentsURI = explode('/',$uri);

        if (!empty($segmentsURI[3]) && in_array($segmentsURI[3], self::$languages)) {
            return $segmentsURI[3];
        } else {
            return  null;
        }
    }
    public function handle($request, Closure $next)
    {
        $locale = self::getLocale();
        if ($locale) {
            if ($locale == self::$mainLanguage)
                return redirect(getUrl($locale), 301);
            App::setLocale($locale);
        } else {
            App::setLocale(self::$mainLanguage);
        }

        return $next($request);
    }
}
