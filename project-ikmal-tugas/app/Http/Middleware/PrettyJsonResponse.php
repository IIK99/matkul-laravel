<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PrettyJsonResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Memaksa Laravel merespons dengan JSON (mencegah redirect ke HTML jika ada error/validasi gagal)
        $request->headers->set('Accept', 'application/json');

        $response = $next($request);

        if ($response instanceof JsonResponse) {
            $response->setEncodingOptions($response->getEncodingOptions() | JSON_PRETTY_PRINT);
        }

        return $response;
    }
}
