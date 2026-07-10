<?php

return [
    'provider' => env('AI_PROVIDER', 'openai'),

    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
        'model' => env('OPENAI_MODEL', 'gpt-4o'),
        'max_tokens' => (int) env('OPENAI_MAX_TOKENS', 500),
        'temperature' => (float) env('OPENAI_TEMPERATURE', 0.7),
    ],
];