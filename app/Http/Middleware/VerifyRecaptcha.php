<?php

namespace App\Http\Middleware;

use App\Rules\Recaptcha;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class VerifyRecaptcha
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('X-Recaptcha-Token') ?? $request->input('recaptcha_token') ?? $request->input('g-recaptcha-response');

        $validator = Validator::make(
            ['g-recaptcha-response' => $token],
            ['g-recaptcha-response' => ['required', new Recaptcha(useScore: true)]]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Falha na verificação do reCAPTCHA',
                'errors' => $validator->errors(),
            ], 422);
        }

        return $next($request);
    }
}
