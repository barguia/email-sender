<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use ReCaptcha\ReCaptcha as ServiceReCaptcha;
class Recaptcha implements ValidationRule
{
    public function __construct(
        private bool $useScore = true  // true = v3; false = v2
    ) {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!config('services.recaptcha.enabled')) {
            // Se desabilitado (ex.: ambiente local), sempre aprova
            return;
        }

        $secret = config('services.recaptcha.secret');
        if (!$secret) {
            $fail('Recaptcha não configurado.');
            return;
        }

        $recaptcha = new ServiceReCaptcha($secret);

        // Opcional (boa prática): restringir hostname e/ou ação (v3)
        $recaptcha->setExpectedHostname(request()->getHost());

        $response = $recaptcha->verify($value, request()->ip());

        if (!$response->isSuccess()) {
            $fail('Falha no recaptcha: '.implode(', ', $response->getErrorCodes()));
            return;
        }

        if ($this->useScore) { // v3
            $minScore = config('services.recaptcha.min_score', 0.5);
            $score = $response->getScore();
            if ($score < $minScore) {
                $fail('Recaptcha score baixo ('.$score.').');
                return;
            }
            // (Opcional) você pode conferir a ação esperada:
            // $action = $response->getAction();
            // if ($action !== 'register') { $fail('Ação inesperada.'); }
        }
    }
}
