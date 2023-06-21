<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\App;

class Localization
{
    const SESSION_KEY = 'locale';
    const LOCALES = ['en', 'lv'];
    
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('lang')) {
            App::setlocale(session()->get('lang'));
            return $next($request);
        }
        else if (session()->has('locale')) {
            $locale = session()->get('locale', Config::get('app.locale'));
        } else {
            $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

            if ($locale != 'lv' && $locale != 'en') {
                $locale = 'en';
            }
        }

        App::setLocale($locale);
        
        return $next($request);
    }
}
