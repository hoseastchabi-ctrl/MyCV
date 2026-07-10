<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Skill\StoreSkillRequest;
use App\Http\Requests\Skill\UpdateSkillRequest;
use App\Http\Resources\SkillResource;
use App\Models\Resume;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class SkillController extends Controller
{
    public function index(Resume $resume): JsonResponse
    {
        Gate::authorize('viewAny', [Skill::class, $resume]);

        return SkillResource::collection($resume->skills)->response();
    }

    public function store(StoreSkillRequest $request, Resume $resume): JsonResponse
    {
        $skill = $resume->skills()->create($request->validated());

        return SkillResource::make($skill)
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateSkillRequest $request, Resume $resume, Skill $skill): JsonResponse
    {
        $skill->update($request->validated());

        return SkillResource::make($skill)->response();
    }

    public function destroy(Resume $resume, Skill $skill): JsonResponse
    {
        Gate::authorize('delete', $skill);

        $skill->delete();

        return response()->json(status: 204);
    }
}