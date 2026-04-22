<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    private const SUPPORTED_LOCALES = ['ar', 'en'];
    private const DEFAULT_LOCALE    = 'ar';

    public function handle(Request $request, Closure $next): Response
    {
        $locale = Session::get('locale', self::DEFAULT_LOCALE);

        if (!in_array($locale, self::SUPPORTED_LOCALES, true)) {
            $locale = self::DEFAULT_LOCALE;
        }

        App::setLocale($locale);

        return $next($request);
    }
}
