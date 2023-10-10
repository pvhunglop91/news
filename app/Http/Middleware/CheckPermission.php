<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        if ($request->user()->hasPermission($permission) || $request->user()->hasRole('Admin')) {
            return $next($request);
        }
        // if (Auth::user()->hasPermission($permission) || Auth::user()->hasRole('Admin')) {
            // return $next($request);
        // }
        return $next($request);
        abort(Response::HTTP_FORBIDDEN, 'This action is unauthorized.');
    }
}
