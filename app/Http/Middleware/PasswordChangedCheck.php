<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PasswordChangedCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        if (
            $request->user() !== null &&
            !$request->user()->password_changed &&
            $request->route()->getName() !== "users.password" &&
            $request->route()->getName() !== "users.password.submit"
        )
            return redirect()->route('users.password');
        return $next($request);
    }
}
