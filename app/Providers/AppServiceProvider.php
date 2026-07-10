<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\AI\AIProviderInterface;
use App\Services\AI\Providers\OpenAIProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
{
    $this->app->bind(AIProviderInterface::class, function (): OpenAIProvider {
        return new OpenAIProvider(
            apiKey: config('ai.openai.api_key'),
            model: config('ai.openai.model'),
            maxTokens: config('ai.openai.max_tokens'),
            temperature: config('ai.openai.temperature'),
        );
    });
}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
