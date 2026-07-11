<?php

namespace App\Providers;

use App\Contracts\AI\AIProviderInterface;
use App\Services\AI\Providers\FakeAIProvider;
use App\Services\AI\Providers\OpenAIProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AIProviderInterface::class, function (): AIProviderInterface {
            return match (config('ai.provider')) {
                'openai' => new OpenAIProvider(
                    apiKey: config('ai.openai.api_key'),
                    model: config('ai.openai.model'),
                    maxTokens: config('ai.openai.max_tokens'),
                    temperature: config('ai.openai.temperature'),
                ),
                default => new FakeAIProvider(),
            };
        });
    }

    public function boot(): void
    {
        Password::defaults(
            static fn (): Password => Password::min(8)->letters()->numbers()
        );
    }
}