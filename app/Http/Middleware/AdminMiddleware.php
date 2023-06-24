<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->user_type !== 'A') {
            // Redirecionar para a página de acesso não autorizado
            return redirect('/');
        }

        return $next($request);
    }
}
