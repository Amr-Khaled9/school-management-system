<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->is('student/dashboard') ||
                $request->is('teacher/dashboard') ||
                $request->is('perent/dashboard')) {
                return route('selection');
            }

            return route('selection'); // الافتراضي
        }
    }
}
