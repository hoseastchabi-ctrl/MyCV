<?php

namespace App\Contracts\AI;

interface AIProviderInterface
{
    public function generate(string $prompt): string;
}