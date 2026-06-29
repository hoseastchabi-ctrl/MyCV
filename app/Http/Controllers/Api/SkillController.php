<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Skill\StoreSkillRequest;
use App\Http\Requests\Skill\UpdateSkillRequest;
use App\Http\Resources\SkillResource;
use App\Models\Resume;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;

class SkillController extends Controller
{
    public function index(Resume $resume): JsonResponse
    {
        $this->authorizeResume($resume);

        return SkillResource::collection($resume->skills)->response();
    }

    public function store(StoreSkillRequest $request, Resume $resume): JsonResponse
    {
        $skill = $resume->skills()->create($request->validated());

        return (new SkillResource($skill))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Skill $skill): JsonResponse
    {
        $this->authorizeSkill($skill);

        return (new SkillResource($skill))->response();
    }

    public function update(UpdateSkillRequest $request, Skill $skill): JsonResponse
    {
        $skill->update($request->validated());

        return (new SkillResource($skill))->response();
    }

    public function destroy(Skill $skill): JsonResponse
    {
        $this->authorizeSkill($skill);

        $skill->delete();

        return response()->json(null, 204);
    }

    private function authorizeResume(Resume $resume): void
    {
        abort_unless($resume->user_id === auth()->id(), 403);
    }

    private function authorizeSkill(Skill $skill): void
    {
        abort_unless($skill->resume->user_id === auth()->id(), 403);
    }
}