<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->route('locale');

        if (! in_array($locale, ['en', 'ar'])) {
            $locale = 'ar'; // Default fallback
        }

        App::setLocale($locale);

        // Share the locale parameter dynamically across all generated URLs
        URL::defaults(['locale' => $locale]);

        return $next($request);
    }
}
