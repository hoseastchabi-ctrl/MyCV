<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Education\StoreEducationRequest;
use App\Http\Requests\Education\UpdateEducationRequest;
use App\Http\Resources\EducationResource;
use App\Models\Education;
use App\Models\Resume;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class EducationController extends Controller
{
    public function index(Resume $resume): JsonResponse
    {
        Gate::authorize('viewAny', [Education::class, $resume]);

        return EducationResource::collection($resume->educations)->response();
    }

    public function store(StoreEducationRequest $request, Resume $resume): JsonResponse
    {
        $education = $resume->educations()->create($request->validated());

        return EducationResource::make($education)
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateEducationRequest $request, Resume $resume, Education $education): JsonResponse
    {
        $education->update($request->validated());

        return EducationResource::make($education)->response();
    }

    public function destroy(Resume $resume, Education $education): JsonResponse
    {
        Gate::authorize('delete', $education);

        $education->delete();

        return response()->json(status: 204);
    }
}