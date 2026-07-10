<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Experience\StoreExperienceRequest;
use App\Http\Requests\Experience\UpdateExperienceRequest;
use App\Http\Resources\ExperienceResource;
use App\Models\Experience;
use App\Models\Resume;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class ExperienceController extends Controller
{
    public function index(Resume $resume): JsonResponse
    {
        Gate::authorize('viewAny', [Experience::class, $resume]);

        return ExperienceResource::collection($resume->experiences)->response();
    }

    public function store(StoreExperienceRequest $request, Resume $resume): JsonResponse
    {
        $experience = $resume->experiences()->create($request->validated());

        return ExperienceResource::make($experience)
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateExperienceRequest $request, Resume $resume, Experience $experience): JsonResponse
    {
        $experience->update($request->validated());

        return ExperienceResource::make($experience)->response();
    }

    public function destroy(Resume $resume, Experience $experience): JsonResponse
    {
        Gate::authorize('delete', $experience);

        $experience->delete();

        return response()->json(status: 204);
    }
}