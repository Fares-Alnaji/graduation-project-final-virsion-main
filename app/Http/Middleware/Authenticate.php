<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('auth.login'); 


        // if (!$request->expectsJson()) {
        //     if (Request::is(App::getLocale() . '/dashboard*') || Request::is('dashboard')) {
        //         return route('auth.login');
        //     } else {
        //         return route('auth.userLogin');
        //     }
        // }
    }
}
