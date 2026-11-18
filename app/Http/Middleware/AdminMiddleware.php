<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'يرجى تسجيل الدخول للوصول إلى لوحة تحكم الأتيليه.');
        }

        if (Auth::user()->role !== 'admin') {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'غير مصرح لك بالدخول، هذا القسم مخصص لصاغة ومديري الدار فقط.');
        }

        return $next($request);
    }
}
