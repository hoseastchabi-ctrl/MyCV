<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Education\StoreEducationRequest;
use App\Http\Requests\Education\UpdateEducationRequest;
use App\Http\Resources\EducationResource;
use App\Models\Education;
use App\Models\Resume;
use Illuminate\Http\JsonResponse;

class EducationController extends Controller
{
    public function index(Resume $resume): JsonResponse
    {
        $this->authorizeResume($resume);

        return EducationResource::collection($resume->educations)->response();
    }

    public function store(StoreEducationRequest $request, Resume $resume): JsonResponse
    {
        $education = $resume->educations()->create($request->validated());

        return (new EducationResource($education))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Education $education): JsonResponse
    {
        $this->authorizeEducation($education);

        return (new EducationResource($education))->response();
    }

    public function update(UpdateEducationRequest $request, Education $education): JsonResponse
    {
        $education->update($request->validated());

        return (new EducationResource($education))->response();
    }

    public function destroy(Education $education): JsonResponse
    {
        $this->authorizeEducation($education);

        $education->delete();

        return response()->json(null, 204);
    }

    private function authorizeResume(Resume $resume): void
    {
        abort_unless($resume->user_id === auth()->id(), 403);
    }

    private function authorizeEducation(Education $education): void
    {
        abort_unless($education->resume->user_id === auth()->id(), 403);
    }
}