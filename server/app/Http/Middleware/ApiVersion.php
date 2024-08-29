<?php

namespace App\Http\Middleware;



use Illuminate\Http\Request;

class ApiVersion
{
    public function handle(Request $request, callable $next, string $version)
    {
        app()->instance('api.version', $version);

        return $next($request);
    }
}