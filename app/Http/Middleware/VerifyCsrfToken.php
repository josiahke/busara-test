<?php

namespace App\Http\Middleware;
use Closure;
use Route;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        'datatables/*',
        'shop/fb/*',
    ];

    public function handle($request, Closure $next)
    {
        $route = Route::getRoutes()->match($request);
        $routeAction = $route->getAction();
        if (isset($routeAction['nocsrf']) && $routeAction['nocsrf']) {
            return $next($request);
        }
        return parent::handle($request, $next);
    }
}
