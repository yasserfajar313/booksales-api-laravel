<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next, $role)
    {
        //  user sudah login dan memiliki role yang sesuai
        if ($request->user() && $request->user()->role === $role) {
            return $next($request);
        }

        // Kalau tidak sesuai, kembalikan respon 403 Forbidden
        return response()->json([
            'status' => 'error',
            'message' => 'Unauthorized access — only ' . $role . ' can access this resource.'
        ], Response::HTTP_FORBIDDEN);
    }
}
