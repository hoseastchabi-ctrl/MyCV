<?php

namespace App\Services\AI\Providers;

use App\Contracts\AI\AIProviderInterface;

class FakeAIProvider implements AIProviderInterface
{
    public function generate(string $prompt): string
    {
        return 'Experienced software engineer with a strong background in backend development and modern web technologies. Demonstrated ability to design and deliver scalable, maintainable applications using industry best practices. Proven track record of collaborating effectively in cross-functional teams and delivering high-quality solutions on time. Passionate about clean architecture, continuous learning, and building products that create real value for users.';
    }
}