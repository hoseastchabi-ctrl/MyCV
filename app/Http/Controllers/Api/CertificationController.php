<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Certification\StoreCertificationRequest;
use App\Http\Requests\Certification\UpdateCertificationRequest;
use App\Http\Resources\CertificationResource;
use App\Models\Certification;
use App\Models\Resume;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class CertificationController extends Controller
{
    public function index(Resume $resume): JsonResponse
    {
        Gate::authorize('viewAny', [Certification::class, $resume]);

        return CertificationResource::collection($resume->certifications)->response();
    }

    public function store(StoreCertificationRequest $request, Resume $resume): JsonResponse
    {
        $certification = $resume->certifications()->create($request->validated());

        return CertificationResource::make($certification)
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCertificationRequest $request, Resume $resume, Certification $certification): JsonResponse
    {
        $certification->update($request->validated());

        return CertificationResource::make($certification)->response();
    }

    public function destroy(Resume $resume, Certification $certification): JsonResponse
    {
        Gate::authorize('delete', $certification);

        $certification->delete();

        return response()->json(status: 204);
    }
}