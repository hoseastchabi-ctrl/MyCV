<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Experience\StoreExperienceRequest;
use App\Http\Requests\Experience\UpdateExperienceRequest;
use App\Http\Resources\ExperienceResource;
use App\Models\Experience;
use App\Models\Resume;
use Illuminate\Http\JsonResponse;

class ExperienceController extends Controller
{
    public function index(Resume $resume): JsonResponse
    {
        $this->authorizeResume($resume);

        return ExperienceResource::collection($resume->experiences)->response();
    }

    public function store(StoreExperienceRequest $request, Resume $resume): JsonResponse
    {
        $experience = $resume->experiences()->create($request->validated());

        return (new ExperienceResource($experience))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Experience $experience): JsonResponse
    {
        $this->authorizeExperience($experience);

        return (new ExperienceResource($experience))->response();
    }

    public function update(UpdateExperienceRequest $request, Experience $experience): JsonResponse
    {
        $experience->update($request->validated());

        return (new ExperienceResource($experience))->response();
    }

    public function destroy(Experience $experience): JsonResponse
    {
        $this->authorizeExperience($experience);

        $experience->delete();

        return response()->json(null, 204);
    }

    private function authorizeResume(Resume $resume): void
    {
        abort_unless($resume->user_id === auth()->id(), 403);
    }

    private function authorizeExperience(Experience $experience): void
    {
        abort_unless($experience->resume->user_id === auth()->id(), 403);
    }
}