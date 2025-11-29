<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SetLocale
{
    /**
     * Handle an incoming request and set the application locale.
     */
    public function __invoke(Request $request, Closure $next)
    {
        // Priority: route parameter {locale}, cookie "locale", Accept-Language, fallback
        $supported = ['en', 'fa'];

        // Order: route param -> query param -> cookie -> Accept-Language -> fallback
        $locale = $request->route('locale') ?? $request->query('locale') ?? $request->cookie('locale');

        if (! $locale) {
            $locale = substr($request->header('Accept-Language', ''), 0, 2) ?: null;
        }

        $source = null;
        if ($request->route('locale')) {
            $source = 'route';
        } elseif ($request->query('locale')) {
            $source = 'query';
        } elseif ($request->cookie('locale')) {
            $source = 'cookie';
        } elseif ($request->header('Accept-Language')) {
            $source = 'header';
        }

        if (! in_array($locale, $supported, true)) {
            $locale = config('app.locale');
        }

        Log::info('SetLocale middleware', ['chosen' => $locale, 'source' => $source]);

        app()->setLocale($locale);

        // Persist choice in cookie for subsequent requests
        $response = $next($request);

        // If cookie not set or different, attach a cookie to the response so the browser stores it
        if ($response instanceof \Illuminate\Http\Response || $response instanceof \Illuminate\Http\RedirectResponse) {
            if ($request->cookie('locale') !== $locale) {
                // Use withCookie to add Set-Cookie header. withCookie returns a
                // response instance; we must assign it back so the header is kept.
                $response = $response->withCookie(cookie()->forever('locale', $locale));
            }
        }

        return $response;
    }
}
