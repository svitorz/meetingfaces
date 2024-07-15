<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\AvoidMethodClashPass;
use Symfony\Component\HttpFoundation\Response;

class UsuarioTemPermissao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (auth()->check()) {
            if (auth()->user()->permissao == $role) {
                return $next($request);
            }
        }
        return abort(401);
    }
}
