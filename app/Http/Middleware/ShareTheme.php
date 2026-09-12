<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ShareTheme
{
    /**
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $theme = $request->session()->get('theme', 'light');

        if ($theme !== 'dark' && $theme !== 'light') {
            $theme = 'light';
        }

        View::share('theme', $theme);

        return $next($request);
    }
}
