<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Invoice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($response->getStatusCode() === 422) {
            $errorResponse = [
                'message' => 'Error de validación',
                'errors' => json_decode($response->getContent(), true)['errors'],
            ];
    
            $customResponse = new JsonResponse($errorResponse, 422);
    
            return $customResponse;
        }
    
        return $response;
    }
    
}
