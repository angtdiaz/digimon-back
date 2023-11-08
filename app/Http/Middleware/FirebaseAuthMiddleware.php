<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Symfony\Component\HttpFoundation\Response;

class FirebaseAuthMiddleware
{
    protected $auth;
    public function __construct()
    {
        $this->auth = Firebase::auth();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $idTokenString = $request->bearerToken();
        if (!$idTokenString) {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
        try {
            $verifiedIdToken = $this->auth->verifyIdToken($idTokenString);
            $request->attributes->add(['firebase_user' => $verifiedIdToken]);
            return $next($request);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
