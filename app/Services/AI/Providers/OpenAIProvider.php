<?php

namespace App\Services\AI\Providers;

use App\Contracts\AI\AIProviderInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class OpenAIProvider implements AIProviderInterface
{
    public function __construct(
        private readonly string $apiKey,
        private readonly string $model,
        private readonly int $maxTokens,
        private readonly float $temperature,
    ) {}

    public function generate(string $prompt): string
    {
        try {
            $response = Http::withToken($this->apiKey)
                ->timeout(30)
                ->post('https://api.openai.com/v1/chat/completions', [
                    'model' => $this->model,
                    'max_tokens' => $this->maxTokens,
                    'temperature' => $this->temperature,
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'You are an expert resume writer with 20 years of experience. You write compelling, concise, and professional resume summaries.',
                        ],
                        [
                            'role' => 'user',
                            'content' => $prompt,
                        ],
                    ],
                ]);

            if ($response->failed()) {
                throw new RuntimeException(
                    'OpenAI API error: ' . $response->json('error.message', 'Unknown error')
                );
            }

            return trim($response->json('choices.0.message.content') ?? '');
        } catch (ConnectionException $e) {
            throw new RuntimeException('Failed to connect to OpenAI API: ' . $e->getMessage());
        }
    }
}