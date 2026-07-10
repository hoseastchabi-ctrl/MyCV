<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Resume\GenerateResumeRequest;
use App\Http\Resources\ResumeGenerationResource;
use App\Models\Resume;
use App\Services\AI\AIResumeService;
use Illuminate\Http\JsonResponse;
use RuntimeException;

class ResumeGenerationController extends Controller
{
    public function __construct(
        private readonly AIResumeService $service,
    ) {}

    public function __invoke(GenerateResumeRequest $request, Resume $resume): JsonResponse
    {
        try {
            $this->service->generateSummary($resume);
        } catch (RuntimeException $e) {
            return response()->json([
                'message' => 'La génération a échoué.',
                'error' => $e->getMessage(),
            ], 503);
        }

        return ResumeGenerationResource::make($resume->fresh())
            ->response()
            ->setStatusCode(200);
    }
}