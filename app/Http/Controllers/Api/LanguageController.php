<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Language\StoreLanguageRequest;
use App\Http\Requests\Language\UpdateLanguageRequest;
use App\Http\Resources\LanguageResource;
use App\Models\Language;
use App\Models\Resume;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class LanguageController extends Controller
{
    public function index(Resume $resume): JsonResponse
    {
        Gate::authorize('viewAny', [Language::class, $resume]);

        return LanguageResource::collection($resume->languages)->response();
    }

    public function store(StoreLanguageRequest $request, Resume $resume): JsonResponse
    {
        $language = $resume->languages()->create($request->validated());

        return LanguageResource::make($language)
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateLanguageRequest $request, Resume $resume, Language $language): JsonResponse
    {
        $language->update($request->validated());

        return LanguageResource::make($language)->response();
    }

    public function destroy(Resume $resume, Language $language): JsonResponse
    {
        Gate::authorize('delete', $language);

        $language->delete();

        return response()->json(status: 204);
    }
}