<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotFoundWhenProduction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $env = config('app.env');
        if ($env == "production") {
            return $this->unauthorized();
        }
        return $next($request);
    }

    private function unauthorized($message = null)
    {
        return response()->json([
            'code' => Response::HTTP_FORBIDDEN,
            'message' => $message ? $message : 'You are unauthorized to access this resource',
        ], Response::HTTP_FORBIDDEN);
    }
}
