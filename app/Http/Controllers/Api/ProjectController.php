<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\Resume;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    public function index(Resume $resume): JsonResponse
    {
        Gate::authorize('viewAny', [Project::class, $resume]);

        return ProjectResource::collection($resume->projects)->response();
    }

    public function store(StoreProjectRequest $request, Resume $resume): JsonResponse
    {
        $project = $resume->projects()->create($request->validated());

        return ProjectResource::make($project)
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateProjectRequest $request, Resume $resume, Project $project): JsonResponse
    {
        $project->update($request->validated());

        return ProjectResource::make($project)->response();
    }

    public function destroy(Resume $resume, Project $project): JsonResponse
    {
        Gate::authorize('delete', $project);

        $project->delete();

        return response()->json(status: 204);
    }
}